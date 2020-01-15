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
    public partial class AddDiscountCodeScreen : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456;Convert Zero Datetime=True;Allow Zero Datetime=True";
        MySqlConnection con = new MySqlConnection(conString);

        public AddDiscountCodeScreen()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            String code = textBox3.Text;
            String usage = textBox1.Text;
            String time = dateTimePicker1.Text;

            if(code == "" || usage == "" || time == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }
            else if(int.Parse(usage) <= 0)
            {
                System.Windows.Forms.MessageBox.Show("Enter the usage bigger than zero.");
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
                    myCommand.CommandText = "call insert_discount_code(?code, ?usage,?time)";

                    myCommand.Parameters.Add(new MySqlParameter("code", code));
                    myCommand.Parameters.Add(new MySqlParameter("usage", usage));
                    myCommand.Parameters.Add(new MySqlParameter("time", time));


                    myCommand.ExecuteNonQuery();


                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Successfully Added.");

                }
                catch (Exception)
                {
                    System.Windows.Forms.MessageBox.Show("You cannot add discount code with the same name.");
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

        private void AddDiscountCodeScreen_Load(object sender, EventArgs e)
        {
            dateTimePicker1.Format = DateTimePickerFormat.Custom;

            dateTimePicker1.CustomFormat = "yyyy-MM-dd";
        }
    }
}
