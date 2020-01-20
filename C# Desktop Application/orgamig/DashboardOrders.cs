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
    public partial class DashboardOrders : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456;";
        String selectedrow = "";
        public static int userid = 0;
        MySqlConnection con = new MySqlConnection(conString);
        DataTable dt;
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        

        public DashboardOrders()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void userID(int id)
        {
            userid = id;
        }

        public void refreshTable()
        {


            String query = "Select ID,orderDate as 'Order Date', address as 'Address', paymentType as 'Payment Type', totalCost as 'Total Cost' from orders where CustomerID=?id";

            try
            {
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = query;
                cmd.Parameters.Add(new MySqlParameter("id", userid));

                adapter = new MySqlDataAdapter();
                adapter.SelectCommand = cmd;

                dt = new DataTable();
                adapter.Fill(dt);

                dataGridView1.DataSource = dt;
            }

            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
            button1.Visible = true;



        }


        public void refreshTable2()
        {


            String query = "Select product.name as 'Product Name',shoppingcart.amountOfProduct as 'Amount of Product',manufacturer.name as 'Manufacturer Name',manufacturer.city as 'Manufacturer City' from shoppingcart,product,manufacturer where shoppingcart.ProductID = product.ID and manufacturer.ID = product.ManufacturerID and OrderID=?id";

            try
            {
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = query;
                cmd.Parameters.Add(new MySqlParameter("id", selectedrow));

                adapter = new MySqlDataAdapter();
                adapter.SelectCommand = cmd;

                dt = new DataTable();
                adapter.Fill(dt);

                dataGridView1.DataSource = dt;
            }

            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }

            button1.Visible = false;



        }

        private void DashboardOrders_Load(object sender, EventArgs e)
        {
            con.Open();
            refreshTable();
            con.Close();


         
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(selectedrow == "")
            {
                System.Windows.Forms.MessageBox.Show("Please Select an Order.");
            }
            else
            {
                refreshTable2();
                selectedrow = "";


            }
            
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int indexrow = e.RowIndex;


            if (indexrow != -1)
            {
                DataGridViewRow selectedRow = dataGridView1.Rows[indexrow];
                selectedrow = selectedRow.Cells[0].Value.ToString();
                
                
            }
        }
    }
}
