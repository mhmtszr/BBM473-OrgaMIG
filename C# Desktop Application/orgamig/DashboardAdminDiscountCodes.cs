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
    public partial class DashboardAdminDiscountCodes : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";

        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;
        String code = "";
        String usage = "";
        String time = "";

        public DashboardAdminDiscountCodes()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void refreshTable()
        {
            String query = "SELECT * FROM discountcodes ORDER BY expireTime";

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

        private void DashboardAdminDiscountCodes_Load(object sender, EventArgs e)
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
            AddDiscountCodeScreen ad = new AddDiscountCodeScreen();
            ad.ShowDialog();
            refreshTable();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if(code == "")
            {
                System.Windows.Forms.MessageBox.Show("Please select a code.");
            }
            else
            {
                UpdateDiscountCodeScreen ud = new UpdateDiscountCodeScreen(code, usage, time);
                ud.ShowDialog();
                refreshTable();
                code = "";
                usage = "";
                time = "";
            }
            
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int indexrow = e.RowIndex;


            if (indexrow != -1)
            {
                DataGridViewRow selectedRow = dataGridView1.Rows[indexrow];
                code = selectedRow.Cells[0].Value.ToString();
                usage = selectedRow.Cells[1].Value.ToString();
                time = selectedRow.Cells[2].Value.ToString();
                


            }
        }
    }
}
