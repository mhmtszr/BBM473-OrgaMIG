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
    public partial class DashboardAdmin : Form
    {
        public DashboardAdmin()
        {
            InitializeComponent();
            dashboardUserControl1.BringToFront();
        }

        private void ProductsButton_Click(object sender, EventArgs e)
        {
            dashboardAdminProducts1.refreshTable();
            dashboardAdminProducts1.BringToFront();
        }

        private void manufacturerButon_Click(object sender, EventArgs e)
        {
            dashboardAdminManufacturers1.refreshTable();
            dashboardAdminManufacturers1.BringToFront();
        }

        private void exitButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginScreen loginPage = new LoginScreen();
            loginPage.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            dashboardUserControl1.BringToFront();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            System.Windows.Forms.Application.Exit();
        }

        private void dashboardUserControl1_Load(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            dashboardAdminCustomers1.refreshTable();
            dashboardAdminCustomers1.BringToFront();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            dashboardAdminDiscountCodes1.refreshTable();
            dashboardAdminDiscountCodes1.BringToFront();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            dashboardAdminComments1.refreshTable();
            dashboardAdminComments1.BringToFront();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Statistics s = new Statistics();
            s.ShowDialog();
        }
    }
}
