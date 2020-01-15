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
    public partial class AddManufacturerScreen : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con = new MySqlConnection(conString);
        public AddManufacturerScreen()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            String name = textBox1.Text;
            String city = textBox2.Text;

            if(name == "" || city == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }
            else
            {
                con.Open();

                MySqlCommand myCommand = con.CreateCommand();
                MySqlTransaction myTrans;

                myTrans = con.BeginTransaction();

                myCommand.Connection = con;
                myCommand.Transaction = myTrans;



                try
                {
                    myCommand.CommandText = "call insert_manufacturer(?name, ?city)";

                    myCommand.Parameters.Add(new MySqlParameter("name", name));
                    myCommand.Parameters.Add(new MySqlParameter("city", city));


                    myCommand.ExecuteNonQuery();


                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Successfully added");

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

        private void AddManufacturerScreen_Load(object sender, EventArgs e)
        {

        }
    }
}
