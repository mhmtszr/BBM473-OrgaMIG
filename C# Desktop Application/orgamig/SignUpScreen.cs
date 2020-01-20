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
using System.Text.RegularExpressions;

namespace orgamig
{
    
    public partial class SignUpScreen : Form
    {
        MySqlConnection connection;

        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con2 = new MySqlConnection(conString);

        public static bool IsPhoneNumber(string number)
        {
            return Regex.Match(number, @"^((0)[0-9]+)$").Success;
        }

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
        public SignUpScreen()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void SignUpScreen_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            System.Windows.Forms.Application.Exit();
        }

        private void SignUpButton_Click(object sender, EventArgs e)
        {
            string firstName = firstNameInput.Text;
            string lastName = lastNameInput.Text;
            string address = addressInput.Text;
            string phoneNumber = phoneNumberInput.Text;
            string mail = mailInput.Text;
            string pass = passwordInput.Text;




            if(firstName == "" || lastName == "" || address == "" || phoneNumber == "" || mail == "" || pass == "")
            {
                MessageBox.Show("Please fill in all informations.");
                return;
            }

            con2.Open();
            try
            {
                string sql2 = "SELECT * FROM customer WHERE mailAddress = '" + mail + "' or phoneNumber = '" + phoneNumber + "'";

                DataTable dt2 = new DataTable();
                MySqlDataAdapter adapter2 = new MySqlDataAdapter();
                MySqlCommand command2 = new MySqlCommand();
                command2.CommandText = sql2;
                command2.Connection = con2;
                adapter2.SelectCommand = command2;
                adapter2.Fill(dt2);
                try
                {
                    dt2.Rows[0]["ID"].ToString();
                    MessageBox.Show("Phone number or mail address used before.");
                    return;

                }
                catch (Exception)
                {
                    
                    if (!string.IsNullOrWhiteSpace(mail))
                    {
                        try
                        {
                            var eMailValidator = new System.Net.Mail.MailAddress(mail);
                        }
                        catch (FormatException)
                        {
                            MessageBox.Show("Invalid Mail Address.");
                            return;
                        }
                    }
                    else
                    {
                        MessageBox.Show("Please fill in all informations.");
                        return;
                    }

                    if (!string.IsNullOrWhiteSpace(phoneNumber))
                    {
                        if (!IsPhoneNumber(phoneNumber))
                        {
                            MessageBox.Show("Invalid Phone Number.");
                            return;
                        }
                    }
                    else
                    {
                        MessageBox.Show("Please fill in all informations.");
                        return;
                    }


                    if (!string.IsNullOrWhiteSpace(firstName) && !string.IsNullOrWhiteSpace(lastName) && !string.IsNullOrWhiteSpace(address) && !string.IsNullOrWhiteSpace(pass))
                    {
                        string conn;
                        MySqlConnectionStringBuilder build = new MySqlConnectionStringBuilder();
                        build.UserID = "root";
                        build.Password = "testtest";
                        build.Database = "orgamig";
                        build.Server = "localhost";

                        conn = build.ToString();
                        connection = new MySqlConnection(conn);

                        string sql = "INSERT INTO customer(firstName,lastName,mailAddress,password,phoneNumber,address) " +
                            "values('" + firstName + "','" + lastName + "','" + mail + "','" + sha256_hash(pass) + "','" + phoneNumber + "','" + address + "');";


                        MySqlDataAdapter adapter = new MySqlDataAdapter();
                        MySqlCommand command = new MySqlCommand();
                        command.CommandText = sql;
                        command.Connection = connection;
                        adapter.SelectCommand = command;

                        MySqlDataReader MyReader;

                        connection.Open();
                        MyReader = command.ExecuteReader();
                        MessageBox.Show("Sign Up Successful. You can login now.");

                        this.Close();
                        LoginScreen loginScreen = new LoginScreen();
                        loginScreen.Show();
                    }
                    else
                    {
                        MessageBox.Show("Please fill in all informations.");
                        return;
                    }
                }
                
            }
            catch (Exception er)
            {
                MessageBox.Show(er.Message);
            }
            finally
            {
                con2.Close();
            }




           
            
        }

        private void textBox5_TextChanged(object sender, EventArgs e)
        {

        }

        private void passwordInput_TextChanged(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginScreen loginPage = new LoginScreen();
            loginPage.Show();
        }
    }
}
