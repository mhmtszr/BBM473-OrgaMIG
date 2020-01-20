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
    public partial class UpdateManufacturerScreen : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con = new MySqlConnection(conString);
        String id = "";
        String name = "";
        String city = "";

        public UpdateManufacturerScreen(string id,string name,string city)
        {
            InitializeComponent();
            this.id = id;
            this.name = name;
            this.city = city;

            textBox3.Text = id;
            textBox1.Text = name;
            textBox2.Text = city;


        }

        private void button1_Click(object sender, EventArgs e)
        {
            

            con.Open();

            MySqlCommand myCommand = con.CreateCommand();
            MySqlTransaction myTrans;

            myTrans = con.BeginTransaction();

            myCommand.Connection = con;
            myCommand.Transaction = myTrans;

            id = textBox3.Text;
            name = textBox1.Text;
            city = textBox2.Text;

            if(id == "" || name == "" || city == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }
            else
            {
                try
                {
                    myCommand.CommandText = "call update_manufacturer(?id,?name, ?city)";

                    myCommand.Parameters.Add(new MySqlParameter("id", id));
                    myCommand.Parameters.Add(new MySqlParameter("name", name));
                    myCommand.Parameters.Add(new MySqlParameter("city", city));


                    myCommand.ExecuteNonQuery();


                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Successfully updated");

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

        private void UpdateManufacturerScreen_Load(object sender, EventArgs e)
        {
            
        }
    }
}
