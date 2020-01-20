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
    public partial class UpdateDiscountCodeScreen : Form
    {

        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con = new MySqlConnection(conString);
        string code = "";
        string usage = "";
        string time = "";

        public UpdateDiscountCodeScreen(string code, string usage, string time)
        {
            InitializeComponent();

            this.code = code;
            this.usage = usage;
            this.time = time;

            textBox3.Text = code;
            textBox1.Text = usage;
            dateTimePicker1.Value = DateTime.Parse(time);
            

        }

        private void UpdateDiscountCodeScreen_Load(object sender, EventArgs e)
        {
            dateTimePicker1.Format = DateTimePickerFormat.Custom;

            dateTimePicker1.CustomFormat = "yyyy-MM-dd";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            con.Open();

            MySqlCommand myCommand = con.CreateCommand();
            MySqlTransaction myTrans;

            myTrans = con.BeginTransaction();

            myCommand.Connection = con;
            myCommand.Transaction = myTrans;

            code = textBox3.Text;
            usage = textBox1.Text;
            time = dateTimePicker1.Text;

            if (code == "" || usage == "" || time == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
            }


            try
            {
                myCommand.CommandText = "call update_discount_codes(?code,?usage, ?time)";

                myCommand.Parameters.Add(new MySqlParameter("code", code));
                myCommand.Parameters.Add(new MySqlParameter("usage", usage));
                myCommand.Parameters.Add(new MySqlParameter("time", time));


                myCommand.ExecuteNonQuery();


                myTrans.Commit();

                System.Windows.Forms.MessageBox.Show("Successfully Updated.");

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
}
