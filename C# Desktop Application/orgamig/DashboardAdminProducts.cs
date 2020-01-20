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
    public partial class DashboardAdminProducts : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456;";
        String id = "";
        String name = "";
        String price = "";
        String stock = "";
        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;

        public DashboardAdminProducts()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void refreshTable()
        {
            String query = "SELECT * FROM productview";

            try
            {
                cmd = new MySqlCommand();
                cmd.Connection = con;
                cmd.CommandText = query;

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
        }

        private void DashboardAdminProducts_Load(object sender, EventArgs e)
        {
            con.Open();
            refreshTable();
            con.Close();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            AddProductScreen ap = new AddProductScreen();
            ap.ShowDialog();
            refreshTable();

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(id == "")
            {
                System.Windows.Forms.MessageBox.Show("Please select the product you want to update.");
            }
            else
            {
                UpdateProductScreen up = new UpdateProductScreen(id, name, price, stock);
                up.ShowDialog();
                refreshTable();
                id = "";
                name = "";
                price = "";
                stock = "";
            }
            
        }

        private void button3_Click(object sender, EventArgs e)
        {
            if(id == "")
            {
                System.Windows.Forms.MessageBox.Show("Please select the product you want to delete.");
                return;
            }
            con.Open();

            MySqlCommand myCommand = con.CreateCommand();
            MySqlTransaction myTrans;

            myTrans = con.BeginTransaction();

            myCommand.Connection = con;
            myCommand.Transaction = myTrans;



            try
            {
                myCommand.CommandText = "call delete_product(?pid)";

                myCommand.Parameters.Add(new MySqlParameter("pid", id));

                myCommand.ExecuteNonQuery();

                myTrans.Commit();

                refreshTable();
                System.Windows.Forms.MessageBox.Show("Successfully deleted");
                id = "";
                name = "";
                price = "";
                stock = "";

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

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int indexrow = e.RowIndex;


            if (indexrow != -1)
            {
                DataGridViewRow selectedRow = dataGridView1.Rows[indexrow];
                id = selectedRow.Cells[0].Value.ToString();
                name = selectedRow.Cells[1].Value.ToString();
                price = selectedRow.Cells[2].Value.ToString();
                stock = selectedRow.Cells[3].Value.ToString();
                

            }
        }
    }
}
