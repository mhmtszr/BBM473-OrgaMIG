using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace orgamig
{
    public partial class AddProductScreen : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        public static int userid = 0;
        
        MySqlConnection con = new MySqlConnection(conString);
        

        public AddProductScreen()
        {
            InitializeComponent();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {

            String pname = textBox1.Text;
            String price = textBox2.Text;
            String stock = textBox3.Text;
            String manufacturer = textBox4.Text;
            String special = "";
            try
            {
                special = comboBox1.SelectedItem.ToString();
            }
            catch (Exception)
            {
                System.Windows.Forms.MessageBox.Show("Please enter type");
                return;
            }
           

            if (special == "" || pname == "" || price == "" || stock == "" || manufacturer == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }
            else
            {
                
                if (special == "Milk and Milk Products")
                {
                    if (textBox5.Text == "")
                    {
                        System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
                        return;
                    }
                    special = textBox5.Text;

                }
                else if (special == "Fruits and Vegetables")
                {
                    try
                    {
                        try
                        {
                            special = comboBox2.SelectedItem.ToString();
                        }
                        catch
                        {
                            System.Windows.Forms.MessageBox.Show("Select season.");
                            return;
                        }
                        
                        
                    }
                    catch (Exception)
                    {
                        System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
                        return;
                    }
                    
                    
                }
                else if (special == "Food of Animal Origin")
                {
                    try
                    {
                        special = comboBox3.SelectedItem.ToString();
                    }
                    catch (Exception)
                    {
                        System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
                        return;
                    }
                }

                con.Open();

                MySqlCommand myCommand = con.CreateCommand();
                MySqlTransaction myTrans;

                myTrans = con.BeginTransaction();

                myCommand.Connection = con;
                myCommand.Transaction = myTrans;
                try
                {
                   

                    if (comboBox1.SelectedItem.ToString() == "Milk and Milk Products")
                    {
                        myCommand.CommandText = "call insert_milk_and_milk_product(?name, ?price,?stock,'milk_and_milk_product',?mid,?specialtext)";
                    }
                    else if (comboBox1.SelectedItem.ToString() == "Fruits and Vegetables")
                    {
                        myCommand.CommandText = "call insert_fruits_and_vegetables(?name, ?price,?stock,'fruits_and_vegetables',?mid,?specialtext)";
                    }
                    else if (comboBox1.SelectedItem.ToString() == "Food of Animal Origin")
                    {
                        myCommand.CommandText = "call insert_food_of_animal_origin(?name, ?price,?stock,'food_of_animal_origin',?mid,?specialtext)";
                    }


                    myCommand.Parameters.Add(new MySqlParameter("name", pname));
                    myCommand.Parameters.Add(new MySqlParameter("price", price));
                    myCommand.Parameters.Add(new MySqlParameter("stock", stock));
                    myCommand.Parameters.Add(new MySqlParameter("mid", manufacturer));
                    myCommand.Parameters.Add(new MySqlParameter("specialtext", special));


                    myCommand.ExecuteNonQuery();


                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Product successfully added");

                }
                catch (Exception er)
                {
                    System.Windows.Forms.MessageBox.Show(er.GetType().ToString());
                    try
                    {
                        myTrans.Rollback();
                    }
                    catch (Exception ex)
                    {
                        if (myTrans.Connection != null)
                        {
                            Console.WriteLine("An exception of type " + ex.GetType() +
                            " was encountered while attempting to roll back the transaction.");
                        }
                    }


                }
                finally
                {
                    con.Close();
                    this.Hide();





                }
            }
            
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            textBox5.Visible = false;
            comboBox3.Visible = false;
            comboBox2.Visible = false;

            if (comboBox1.SelectedItem.ToString() == "Milk and Milk Products")
            {
                label6.Text = "Amount of Sugar";
                label6.Visible = true;
                textBox5.Visible = true;
            }
            else if (comboBox1.SelectedItem.ToString() == "Fruits and Vegetables")
            {
                
                label6.Text = "Season";
                label6.Visible = true;
                comboBox2.Visible = true;
            }
            else if(comboBox1.SelectedItem.ToString() == "Food of Animal Origin")
            {
               
                label6.Text = "Meat Type";
                label6.Visible = true;
                comboBox3.Visible = true;
            }
        }

        private void AddProductScreen_Load(object sender, EventArgs e)
        {

        }

        private void comboBox3_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {

        }
    }
}
