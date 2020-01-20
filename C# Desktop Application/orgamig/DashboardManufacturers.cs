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
    public partial class DashboardManufacturers : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        String selectedrow = "";

        public static int userid = 0;
        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;

        public DashboardManufacturers()
        {
            InitializeComponent();
            
            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }
        public void manufacturerload()
        {
            label1.Visible = true;
            label2.Visible = true;
            textBox1.Visible = true;
            starComboBox.Visible = true;
            button1.Visible = true;
            button2.Visible = true;
        }
        public void refreshTable()
        {
            String query = "SELECT * FROM averageStar";

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

        public void refreshTable2()
        {
            String query = "SELECT CustomerName,comment,commentDate,commentStar FROM `commentview` where ManufacturerID = " + selectedrow+ " order by commentDate";

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

            catch (Exception)
            {
                MessageBox.Show("Click On the Manufacturer Whose Comments You Want to See.");
            }
        }

        private void DashboardManufacturers_Load(object sender, EventArgs e)
        {
            con.Open();
            manufacturerload();
            refreshTable();
            con.Close();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }


        private void button1_Click(object sender, EventArgs e)
        {
            if (!string.IsNullOrWhiteSpace(textBox1.Text) && starComboBox.SelectedItem != null)
            {
                con.Open();

                MySqlCommand myCommand = con.CreateCommand();
                MySqlTransaction myTrans;
                myTrans = con.BeginTransaction();

                myCommand.Connection = con;
                myCommand.Transaction = myTrans;

                try
                {
                    myCommand.CommandText = "call insert_comment(?customerid, ?manufacturerid, ?comment, ?date, ?star)";

                    String commentText = textBox1.Text;

                    myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                    myCommand.Parameters.Add(new MySqlParameter("manufacturerid", selectedrow));
                    myCommand.Parameters.Add(new MySqlParameter("comment", commentText));
                    myCommand.Parameters.Add(new MySqlParameter("date", DateTime.Now));
                    myCommand.Parameters.Add(new MySqlParameter("star", int.Parse(starComboBox.SelectedItem.ToString())));

                    myCommand.ExecuteNonQuery();

                    myTrans.Commit();

                    refreshTable();
                    System.Windows.Forms.MessageBox.Show("Comment successfully.");

                    selectedrow = "";

                }
                catch (Exception)
                {
                    System.Windows.Forms.MessageBox.Show("Click On the Manufacturer Whose Comments You Want to See.");
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
            else
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
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

        private void button2_Click(object sender, EventArgs e)
        {
            if(selectedrow == "")
            {
                System.Windows.Forms.MessageBox.Show("Click On the Manufacturer Whose Comments You Want to See.");
            }
            else
            {
                refreshTable2();
                selectedrow = "";
                label1.Visible = false;
                label2.Visible = false;
                textBox1.Visible = false;
                starComboBox.Visible = false;
                button1.Visible = false;
                button2.Visible = false;
            }
            
            

        }
    }
}
