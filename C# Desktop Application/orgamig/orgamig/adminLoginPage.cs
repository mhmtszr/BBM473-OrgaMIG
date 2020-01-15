using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace orgamig
{
    public partial class adminLoginScreen : Form
    {
        public adminLoginScreen()
        {
            InitializeComponent();
        }

        private void adminLoginScreen_Load(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            System.Windows.Forms.Application.Exit();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            string username = usernameInput.Text;
            string pass = passwordInput.Text;


            if(username == "admin" && pass == "passw0rd")
            {
                MessageBox.Show("Admin login successful");
                this.Hide();
                DashboardAdmin db = new DashboardAdmin();
                db.Show();
            }
            else
            {
                MessageBox.Show("Admin login unsuccessful");

            }
        }

        private void Back_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginScreen loginPage = new LoginScreen();
            loginPage.Show();
        }
    }
}
