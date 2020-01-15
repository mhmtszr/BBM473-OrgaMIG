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
    public partial class DashboardAdminCustomers : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        String selectedrow = "";

        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;

        public DashboardAdminCustomers()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void refreshTable()
        {
            String query = "SELECT ID,firstName,lastName,mailAddress,phoneNumber,address,isDeleted FROM customer ORDER BY ID";

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

        private void DashboardAdminCustomers_Load(object sender, EventArgs e)
        {
            con.Open();
            refreshTable();
            con.Close();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            if (selectedrow == "")
            {
                System.Windows.Forms.MessageBox.Show("Please select the user you want to delete");
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
                myCommand.CommandText = "call delete_customer(?customerid)";


                myCommand.Parameters.Add(new MySqlParameter("customerid", selectedrow));

                myCommand.ExecuteNonQuery();

                myTrans.Commit();

                refreshTable();


                System.Windows.Forms.MessageBox.Show("Successfully Deleted");
                selectedrow = "";

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
                selectedrow = selectedRow.Cells[0].Value.ToString();
                
            }
        }
    }
}
