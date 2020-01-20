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
    public partial class UpdateProductScreen : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con = new MySqlConnection(conString);
        String id = "";
        String name = "";
        String price = "";
        String stock = "";
        public UpdateProductScreen(string id,string name, string price, string stock)
        {
            InitializeComponent();

            this.id = id;
            this.name = name;
            this.price = price;
            this.stock = stock;

            textBox4.Text = id;
            textBox1.Text = name;
            textBox2.Text = price;
            textBox3.Text = stock;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            con.Open();

            MySqlCommand myCommand = con.CreateCommand();
            MySqlTransaction myTrans;

            myTrans = con.BeginTransaction();

            myCommand.Connection = con;
            myCommand.Transaction = myTrans;

            id = textBox4.Text;
            name = textBox1.Text;
            price = textBox2.Text;
            stock = textBox3.Text;

            if(id == "" || name == "" || price == "" || stock == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }
            else
            {
                try
                {
                    myCommand.CommandText = "call update_product(?id,?name,?price,?stock,'')";

                    myCommand.Parameters.Add(new MySqlParameter("id", id));
                    myCommand.Parameters.Add(new MySqlParameter("name", name));
                    myCommand.Parameters.Add(new MySqlParameter("price", price));
                    myCommand.Parameters.Add(new MySqlParameter("stock", stock));


                    myCommand.ExecuteNonQuery();


                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Update successful.");

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

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void textBox4_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
