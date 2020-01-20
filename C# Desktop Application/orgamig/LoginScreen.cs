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
using System.Security.Cryptography;

namespace orgamig
{
    public partial class LoginScreen : Form
    {
        MySqlConnection connection;

        public static String sha256_hash(String value)
        {
            StringBuilder Sb = new StringBuilder();

            using (SHA256 hash = SHA256Managed.Create())
            {
                Encoding enc = Encoding.UTF8;
                Byte[] result = hash.ComputeHash(enc.GetBytes(value));

                foreach (Byte b in result)
                    Sb.Append(b.ToString("x2"));
            }

            return Sb.ToString();
        }
        public LoginScreen()
        {
            InitializeComponent();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            SignUpScreen signup = new SignUpScreen();
            signup.Show();
        }

        private void textBox5_TextChanged(object sender, EventArgs e)
        {

        }

        private void LoginScreen_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                string mail = textBox4.Text;
                string pass = textBox5.Text;

                if (mail == "" || pass == "")
                {
                    System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
                }
                else
                {
                    string conn;
                    MySqlConnectionStringBuilder build = new MySqlConnectionStringBuilder();
                    build.UserID = "root";
                    build.Password = "123456";
                    build.Database = "orgamig";
                    build.Server = "localhost";

                    conn = build.ToString();
                    connection = new MySqlConnection(conn);


                    string sql = "SELECT * FROM customer WHERE mailAddress ='" + mail + "'";

                    DataTable dt = new DataTable();
                    MySqlDataAdapter adapter = new MySqlDataAdapter();
                    MySqlCommand command = new MySqlCommand();
                    command.CommandText = sql;
                    command.Connection = connection;
                    adapter.SelectCommand = command;


                    connection.Open();
                    adapter.Fill(dt);

                    string passcontrol = dt.Rows[0]["password"].ToString();
                    string isblocked = dt.Rows[0]["isDeleted"].ToString();

                    if (isblocked == "0")
                    {
                        if (sha256_hash(pass) == passcontrol)
                        {
                            System.Windows.Forms.MessageBox.Show("Login Successful.");
                            this.Hide();
                            DashboardOrders.userid = int.Parse(dt.Rows[0]["ID"].ToString());


                            DashboardProducts1.userid = int.Parse(dt.Rows[0]["ID"].ToString());

                            DashboardShoppingCart.userid = int.Parse(dt.Rows[0]["ID"].ToString());

                            DashboardOrders.userid = int.Parse(dt.Rows[0]["ID"].ToString());

                            DashboardManufacturers.userid = int.Parse(dt.Rows[0]["ID"].ToString());

                            DashboardProfile.userid = int.Parse(dt.Rows[0]["ID"].ToString());


                            Dashboard db = new Dashboard();
                            db.Show();
                        }
                        else
                        {
                            System.Windows.Forms.MessageBox.Show("Login Failed.");

                        }
                    }
                    else
                    {
                        System.Windows.Forms.MessageBox.Show("Your Account Has Been Suspended.");
                    }



                    connection.Close();
                }
            }
            catch (Exception)
            {
                System.Windows.Forms.MessageBox.Show("Login Failed.");
            }
            
            



        }

        private void button3_Click_1(object sender, EventArgs e)
        {
            this.Hide();
            adminLoginScreen admin = new adminLoginScreen();
            admin.Show();
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }
    }
}
