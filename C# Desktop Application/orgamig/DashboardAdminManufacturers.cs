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
    public partial class DashboardAdminManufacturers : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";

        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;
        String id = "";
        String name = "";
        String city = "";
        public DashboardAdminManufacturers()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void refreshTable()
        {
            String query = "SELECT * FROM manufacturer ORDER BY ID";

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

        private void DashboardAdminManufacturers_Load(object sender, EventArgs e)
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
            AddManufacturerScreen ams = new AddManufacturerScreen();
            ams.ShowDialog();
            refreshTable();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(id == "")
            {
                System.Windows.Forms.MessageBox.Show("Lütfen güncellemek istediğiniz satıcıyı seçin.");
            }
            else
            {
                UpdateManufacturerScreen ups = new UpdateManufacturerScreen(id, name, city);
                ups.ShowDialog();
                refreshTable();
                id = "";
                name = "";
                city = "";
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
                city = selectedRow.Cells[2].Value.ToString();
                
                
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            if (id == "")
            {
                System.Windows.Forms.MessageBox.Show("Please select the manufacturer you want to delete.");
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
                myCommand.CommandText = "call delete_manufacturer(?manuid)";

                myCommand.Parameters.Add(new MySqlParameter("manuid", id));
                
                myCommand.ExecuteNonQuery();

                myTrans.Commit();

                refreshTable();
                System.Windows.Forms.MessageBox.Show("Successfully Deleted.");
                id = "";
                name = "";
                city = "";

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
