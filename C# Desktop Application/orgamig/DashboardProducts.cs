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
    public partial class DashboardProducts1 : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456;";
        public static int userid = 0;
        string selectedrow = "";
        string selectedrowstock = "";
        string selectedname = "";
        MySqlConnection con = new MySqlConnection(conString);
        MySqlCommand cmd;
        MySqlDataAdapter adapter;
        DataTable dt;


        

        public DashboardProducts1()
        {
            InitializeComponent();
      
            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }

        public void refreshTable()
        {
            String query = "";
            if(comboBox1.Text == "Milk and Milk Products")
            {
                query = "SELECT p1.ID, p1.name as 'Product Name',p1.price as 'Product Price',p1.stock as 'Product Stock',p2.name as 'Manufacturer Name',p2.city as 'Manufacturer City',p3.amountOfMilkSugar as 'Amount of Milk Sugar' FROM product p1,manufacturer p2,milkandmilkproducts p3 where p1.stock <> 0 and p1.ManufacturerID = p2.ID and p2.isDeleted = 0 and p1.isDeleted = 0 and p1.ID = p3.ProductID order by p1.ID";
         
            }
            else if(comboBox1.Text == "Fruits and Vegetables")
            {
                query = "SELECT p1.ID, p1.name as 'Product Name',p1.price as 'Product Price',p1.stock as 'Product Stock',p2.name as 'Manufacturer Name',p2.city as 'Manufacturer City',p3.season as 'Season' FROM product p1,manufacturer p2,fruitsandvegetables p3 where p1.stock <> 0 and p1.ManufacturerID = p2.ID and p2.isDeleted = 0 and p1.isDeleted = 0 and p1.ID = p3.ProductID order by p1.ID";
            }
            else if (comboBox1.Text == "Food of Animal Origin")
            {
                query = "SELECT p1.ID, p1.name as 'Product Name',p1.price as 'Product Price',p1.stock as 'Product Stock',p2.name as 'Manufacturer Name',p2.city as 'Manufacturer City',p3.meatType 'Meat Type' FROM product p1,manufacturer p2,foodofanimalorigin p3 where p1.stock <> 0 and p1.ManufacturerID = p2.ID and p2.isDeleted = 0 and p1.isDeleted = 0 and p1.ID = p3.ProductID order by p1.ID";
            }
            else
            {
                query = "SELECT p1.ID, p1.name as 'Product Name',p1.price as 'Product Price',p1.stock as 'Product Stock',p2.name as 'Manufacturer Name',p2.city as 'Manufacturer City' FROM product p1,manufacturer p2 where p1.ManufacturerID = p2.ID and p1.stock <> 0 and p2.isDeleted = 0 and p1.isDeleted = 0 order by p1.ID";
            }

                

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


        private void DashboardProducts_Load(object sender, EventArgs e)
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
            String stok = stokText.Text;
            if(stok == "" || selectedrow == "")
            {
                System.Windows.Forms.MessageBox.Show("Please Enter the Amount of Product After Selecting a Product.");
            }
            else
            {
                if (int.Parse(stok) > 0)
                {
                    con.Open();

                    MySqlCommand myCommand = con.CreateCommand();
                    MySqlTransaction myTrans;

                    myTrans = con.BeginTransaction();

                    myCommand.Connection = con;
                    myCommand.Transaction = myTrans;

                    try
                    {
                        myCommand.CommandText = "call insert_shopping_cart(?customerid, ?productid, ?amountof, ?date)";

                        myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                        myCommand.Parameters.Add(new MySqlParameter("productid", selectedrow));
                        myCommand.Parameters.Add(new MySqlParameter("amountof", int.Parse(stok)));
                        myCommand.Parameters.Add(new MySqlParameter("date", DateTime.Now));

                        myCommand.ExecuteNonQuery();

                        if (int.Parse(stok) > int.Parse(selectedrowstock))
                        {
                            System.Windows.Forms.MessageBox.Show("Out of stock.");
                            return;
                        }
                        else if ((int.Parse(stok) == int.Parse(selectedrowstock)))
                        {
                            myCommand.CommandText = "UPDATE Product SET stock = 0  WHERE ID = ?productupdateid";

                        }
                        else
                        {
                            myCommand.CommandText = "call update_product(?productupdateid, '', '', ?newstock,'')";
                            int newstockint = int.Parse(selectedrowstock) - int.Parse(stok);

                            myCommand.Parameters.Add(new MySqlParameter("newstock", newstockint.ToString()));
                        }


                        myCommand.Parameters.Add(new MySqlParameter("productupdateid", selectedrow));
                        myCommand.ExecuteNonQuery();

                        myTrans.Commit();

                        refreshTable();
                        System.Windows.Forms.MessageBox.Show("Product "+ selectedname+" Successfully Added to Your Cart.");

                        selectedrow = "";
                        selectedrowstock = "";
                        selectedname = "";

                    }
                    catch (Exception)
                    {
                        System.Windows.Forms.MessageBox.Show("Please Do Not Add the Product Already in Your Cart.");
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
                    System.Windows.Forms.MessageBox.Show("Invalid Amount of Product.");

                }
            }
           
            
        }


        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click_1(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int indexrow = e.RowIndex;
            

            if (indexrow != -1)
            {
                DataGridViewRow selectedRow = dataGridView1.Rows[indexrow];
                selectedrow = selectedRow.Cells[0].Value.ToString();
                selectedname = selectedRow.Cells[1].Value.ToString();
                selectedrowstock = selectedRow.Cells[3].Value.ToString();
               
            }
            
            


        }

        private void dataGridView1_CellContentDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            refreshTable();
        }
    }
}
