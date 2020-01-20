using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace orgamig
{
    public partial class DashboardProfile : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";

        public static int userid = 0;
        MySqlConnection con = new MySqlConnection(conString);
        

        public DashboardProfile()
        {
            InitializeComponent();

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void DashboardProfile_Load(object sender, EventArgs e)
        {
            con.Open();
            string sql = "SELECT firstName,lastName,mailAddress,phoneNumber,address FROM customer where ID=" + userid.ToString();

            DataTable dt = new DataTable();
            MySqlDataAdapter adapter = new MySqlDataAdapter();
            MySqlCommand command = new MySqlCommand();
            command.CommandText = sql;
            command.Connection = con;
            adapter.SelectCommand = command;

            adapter.Fill(dt);

            string name = dt.Rows[0]["firstName"].ToString();
            string lastname = dt.Rows[0]["lastName"].ToString();
            string mailAddress = dt.Rows[0]["mailAddress"].ToString();
            string phoneNumber = dt.Rows[0]["phoneNumber"].ToString();
            string address = dt.Rows[0]["address"].ToString();

            textBox1.Text = name;
            textBox2.Text = lastname;
            textBox3.Text = mailAddress;
            textBox4.Text = phoneNumber;
            textBox5.Text = address;


            con.Close();

        }

        private void button1_Click(object sender, EventArgs e)
        {
            
            if(textBox1.Text == "" || textBox2.Text == "" || textBox5.Text == "")
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
                    myCommand.CommandText = "call update_customer(?customerid,?firstname,?lastname,'','',?address)";
                    myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                    myCommand.Parameters.Add(new MySqlParameter("firstname", textBox1.Text));
                    myCommand.Parameters.Add(new MySqlParameter("lastname", textBox2.Text));
                    myCommand.Parameters.Add(new MySqlParameter("address", textBox5.Text));

                    myCommand.ExecuteNonQuery();

                    myTrans.Commit();

                    System.Windows.Forms.MessageBox.Show("Profile Successfully Updated.");

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
                }
            }
            
        }
    }
}
