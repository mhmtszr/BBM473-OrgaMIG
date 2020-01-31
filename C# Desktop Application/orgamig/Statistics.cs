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

namespace orgamig
{
    public partial class Statistics : Form
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";
        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd = new MySqlCommand();

        public Statistics()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
        }


        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void Statistics_Load(object sender, EventArgs e)
        {
            con.Open();

            try
            {
                string sql = "SELECT COUNT(*) FROM Customer;";
                cmd.CommandText = sql;
                cmd.Connection = con;
                textBox2.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM Manufacturer;";
                textBox3.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM Product;";
                textBox4.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM Orders;";
                textBox5.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM ShoppingCart;";
                textBox6.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM MilkAndMilkProducts;";
                textBox12.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM FruitsAndVegetables;";
                textBox11.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM FoodOfAnimalOrigin;";
                textBox10.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM Comment;";
                textBox9.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM DiscountCodes;";
                textBox8.Text = Convert.ToString(cmd.ExecuteScalar());

                cmd.CommandText = "SELECT COUNT(*) FROM CustomerUsesDiscount;";
                textBox7.Text = Convert.ToString(cmd.ExecuteScalar());

            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
