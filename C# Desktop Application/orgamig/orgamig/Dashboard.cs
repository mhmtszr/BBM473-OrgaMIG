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
    public partial class Dashboard : Form
    {
        

        public Dashboard()
        {
            InitializeComponent();
            dashboardUserControl1.BringToFront();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            
        }

        private void panel2_Paint(object sender, PaintEventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e) //products button
        {
            dashboardProducts1.refreshTable();
            dashboardProducts1.BringToFront();
            
            
        }

        private void userControl11_Load(object sender, EventArgs e)
        {

        }

        private void Dashboard_Load(object sender, EventArgs e)
        {
            
            dashboardUserControl1.BringToFront();
        }

        private void label1_Click(object sender, EventArgs e)
        {
            
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void dashboardProducts1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            System.Windows.Forms.Application.Exit();
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            dashboardUserControl2.BringToFront();
        }

        private void OrdersButton_Click(object sender, EventArgs e)
        {
            dashboardOrders1.refreshTable();
            dashboardOrders1.BringToFront();
        }

        private void dashboardOrders1_Load_2(object sender, EventArgs e)
        {
            
        }

        private void dashboardUserControl2_Load(object sender, EventArgs e)
        {

        }

        private void ShoppingCartButton_Click(object sender, EventArgs e)
        {
            dashboardShoppingCart1.refreshTable();
            dashboardShoppingCart1.dashboardLoad();
            dashboardShoppingCart1.BringToFront();
        }

        private void exitButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            LoginScreen loginPage = new LoginScreen();
            loginPage.Show();
        }

        private void manufacturerButon_Click(object sender, EventArgs e)
        {
            dashboardManufacturers1.refreshTable();
            dashboardManufacturers1.manufacturerload();
            dashboardManufacturers1.BringToFront();
        }

        private void ProfileButton_Click(object sender, EventArgs e)
        {
          
            dashboardProfile1.BringToFront();
        }

        
    }
}
