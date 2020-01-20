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
    public partial class DashboardShoppingCart : UserControl
    {
        static string conString = "Server=localhost;Database=orgamig;Uid=root;password=123456";

        public static int userid = 0;
        public static int indirim = 0;
        string selectedrow = "";
        string deletedStock = "";
        string productStock = "";
        string selectedname = "";
        MySqlConnection con = new MySqlConnection(conString);
        DataTable dt;
        MySqlDataAdapter adapter;
        MySqlCommand cmd;

        public DashboardShoppingCart()
        {
            InitializeComponent();

            dataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill;
        }


        public void refreshTable()
        {


            String query = "SELECT product.ID,product.name as 'Product Name', manufacturer.name as 'Manufacturer',amountOfProduct as 'Amount of Product', (product.price*amountOfProduct) as 'Total Price',addedDate as 'Date', product.stock as \"Remaining Stock\" FROM shoppingcart, product, manufacturer WHERE product.ManufacturerID = manufacturer.ID and manufacturer.isDeleted = 0 and product.isDeleted = 0 and shoppingcart.productID = product.ID AND CustomerID=?id AND OrderID=0 ORDER BY product.ID";

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


            double sum = 0;
            for (int i = 0; i <= dataGridView1.Rows.Count - 1; i++)
            {

                sum = sum + Convert.ToDouble(dataGridView1.Rows[i].Cells[4].Value.ToString());

            }

            textBox1.Text = sum.ToString() + "₺";



        }
        public void dashboardLoad()
        {
            codeButton.Visible = false;
            textBox2.Visible = false;
            label2.Visible = false;
            button2.Visible = false;
            label1.Visible = true;
            label3.Visible = true;
            textBox1.Visible = true;
            amountText.Visible = true;
            updateButton.Visible = true;
            adresText.Visible = true;
            button1.Visible = true;
            deleteOrderButton.Visible = true;
            comboBox2.Visible = true;
            paymentType.Visible = true;
        }
        private void DashboardShoppingCart_Load(object sender, EventArgs e)
        {
            dashboardLoad();



            con.Open();
            refreshTable();
            con.Close();
        }

        private int get_orderID()
        {

            
            string sql = "SELECT increment_insert_orders FROM sequences WHERE ID = 1";

            DataTable dt = new DataTable();
            MySqlDataAdapter adapter = new MySqlDataAdapter();
            MySqlCommand command = new MySqlCommand();
            command.CommandText = sql;
            command.Connection = con;
            adapter.SelectCommand = command;


            adapter.Fill(dt);

            string orderid = dt.Rows[0]["increment_insert_orders"].ToString();


            return int.Parse(orderid);
        }
            

        private void button1_Click(object sender, EventArgs e)
        {
            if(!string.IsNullOrWhiteSpace(adresText.Text) && comboBox2.SelectedItem != null)
            {
                if(Convert.ToDouble(textBox1.Text.Remove(textBox1.Text.Length - 1)) != 0)
                {
                    codeButton.Visible = true;
                    textBox2.Visible = true;
                    label2.Visible = true;
                    label1.Visible = true;
                    textBox1.Visible = true;
                    button2.Visible = true;


                    label3.Visible = false;
                    amountText.Visible = false;
                    updateButton.Visible = false;
                    adresText.Visible = false;
                    button1.Visible = false;
                    deleteOrderButton.Visible = false;
                    comboBox2.Visible = false;
                    paymentType.Visible = false;
                }
                else
                {
                    System.Windows.Forms.MessageBox.Show("Your shopping cart is empty.");
                }
                
            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Please fill out all the fields.");
            }
            
            
            
            

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void deleteOrderButton_Click(object sender, EventArgs e)
        {
            if(selectedrow == "")
            {
                System.Windows.Forms.MessageBox.Show("Please Select the Product You Want to Delete.");
            }
            else
            {
                con.Open();

                MySqlCommand myCommand = con.CreateCommand();
                MySqlTransaction myTrans;

                myTrans = con.BeginTransaction();

                myCommand.Connection = con;
                myCommand.Transaction = myTrans;

                try
                {
                    myCommand.CommandText = "call delete_shopping_cart(?customerid, ?productid)";


                    myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                    myCommand.Parameters.Add(new MySqlParameter("productid", selectedrow));

                    myCommand.ExecuteNonQuery();

                    myCommand.CommandText = "call update_product(?productid,'','',?updateproductstock,'')";
                    int newstockint = int.Parse(deletedStock) + int.Parse(productStock);

                    myCommand.Parameters.Add(new MySqlParameter("updateproductstock", newstockint));

                    myCommand.ExecuteNonQuery();

                    myTrans.Commit();

                    refreshTable();

                    System.Windows.Forms.MessageBox.Show("Product "+selectedname + " Successfully Deleted From Cart.");

                    selectedrow = "";
                    selectedname = "";

                    deletedStock = "";
                    productStock = "";

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

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            int indexrow = e.RowIndex;


            if (indexrow != -1)
            {
                DataGridViewRow selectedRow = dataGridView1.Rows[indexrow];
                selectedrow = selectedRow.Cells[0].Value.ToString();
                selectedname = selectedRow.Cells[1].Value.ToString();
                
                deletedStock = selectedRow.Cells[3].Value.ToString();
                productStock = selectedRow.Cells[6].Value.ToString();
            }
        }

        private void updateButton_Click(object sender, EventArgs e)
        {
            String text = amountText.Text;
            if(text == "")
            {
                System.Windows.Forms.MessageBox.Show("Please fill in all informations.");
                return;
            }
            if(int.Parse(text) < 0)
            {
                System.Windows.Forms.MessageBox.Show("Invalid Amount Of.");
                return;
            }
            try
            {
                if (int.Parse(text) > (int.Parse(deletedStock) + int.Parse(productStock)))
                {
                    System.Windows.Forms.MessageBox.Show("Out of stock.");
                }else if(int.Parse(text) == 0)
                {
                    con.Open();

                    MySqlCommand myCommand = con.CreateCommand();
                    MySqlTransaction myTrans;

                    myTrans = con.BeginTransaction();

                    myCommand.Connection = con;
                    myCommand.Transaction = myTrans;

                    try
                    {
                        myCommand.CommandText = "call delete_shopping_cart(?customerid, ?productid)";


                        myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                        myCommand.Parameters.Add(new MySqlParameter("productid", selectedrow));

                        myCommand.ExecuteNonQuery();

                        myCommand.CommandText = "call update_product(?productid,'','',?updateproductstock,'')";
                        int newstockint = int.Parse(deletedStock) + int.Parse(productStock);

                        myCommand.Parameters.Add(new MySqlParameter("updateproductstock", newstockint));

                        myCommand.ExecuteNonQuery();

                        myTrans.Commit();

                        refreshTable();

                        System.Windows.Forms.MessageBox.Show(selectedname + " Deleted From Your Cart.");


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
                else
                {
                    con.Open();

                    MySqlCommand myCommand = con.CreateCommand();
                    MySqlTransaction myTrans;

                    myTrans = con.BeginTransaction();

                    myCommand.Connection = con;
                    myCommand.Transaction = myTrans;

                    try
                    {
                        myCommand.CommandText = "call update_shopping_cart(?customerid, ?productid, '' ,?updateproduct)";

                        myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                        myCommand.Parameters.Add(new MySqlParameter("productid", selectedrow));
                        myCommand.Parameters.Add(new MySqlParameter("updateproduct", int.Parse(text)));

                        myCommand.ExecuteNonQuery();

                        myCommand.CommandText = "call update_product(?productid,'','',?updateproductstock,'')";
                        int newstockint = int.Parse(deletedStock) + int.Parse(productStock) - int.Parse(text);
                        myCommand.Parameters.Add(new MySqlParameter("updateproductstock", newstockint));

                        myCommand.ExecuteNonQuery();

                        myTrans.Commit();

                        refreshTable();
                        System.Windows.Forms.MessageBox.Show("Amount of " + selectedname + " In Your Cart Updated.");

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
            catch (Exception)
            {
                System.Windows.Forms.MessageBox.Show("Please select a product and enter the value you want to update.");
            }
           
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void textBox3_TextChanged(object sender, EventArgs e)
        {

        }

        private void codeButton_Click(object sender, EventArgs e)
        {
            String code = textBox2.Text;
            if(code != "")
            {
                con.Open();
                try
                {
                    string sql = "SELECT * FROM customerusesdiscount WHERE CustomerID = " + userid.ToString() + " and DiscountCode = '" + code + "'";

                    DataTable dt = new DataTable();
                    MySqlDataAdapter adapter = new MySqlDataAdapter();
                    MySqlCommand command = new MySqlCommand();
                    command.CommandText = sql;
                    command.Connection = con;
                    adapter.SelectCommand = command;
                    adapter.Fill(dt);

                    try
                    {
                        dt.Rows[0]["DiscountCode"].ToString();
                        System.Windows.Forms.MessageBox.Show("You Used It Before.");
                    }
                    catch (Exception)
                    {
                        sql = "SELECT * FROM discountcodes WHERE Code = '" + code + "'";

                        dt = new DataTable();
                        adapter = new MySqlDataAdapter();
                        command = new MySqlCommand();
                        command.CommandText = sql;
                        command.Connection = con;
                        adapter.SelectCommand = command;


                        adapter.Fill(dt);

                        string usage = dt.Rows[0]["numberOfUsage"].ToString();
                        string date = dt.Rows[0]["expireTime"].ToString();


                        DateTime a = Convert.ToDateTime(date);

                        int x = DateTime.Compare(a, DateTime.Now);
                        if (x > 0)
                        {
                            if (int.Parse(usage) > 0)
                            {

                                MySqlCommand myCommand = con.CreateCommand();
                                MySqlTransaction myTrans;

                                myTrans = con.BeginTransaction();

                                myCommand.Connection = con;
                                myCommand.Transaction = myTrans;



                                try
                                {
                                    myCommand.CommandText = "call update_discount_codes(?code,?usage,'')";

                                    usage = (int.Parse(usage) - 1).ToString();
                                    myCommand.Parameters.Add(new MySqlParameter("code", code));
                                    myCommand.Parameters.Add(new MySqlParameter("usage", usage));


                                    myCommand.ExecuteNonQuery();

                                    myCommand.CommandText = "call insert_customer_uses_discount(?id,?code,?date)";


                                    myCommand.Parameters.Add(new MySqlParameter("id", userid.ToString()));

                                    myCommand.Parameters.Add(new MySqlParameter("date", DateTime.Now));


                                    myCommand.ExecuteNonQuery();

                                    myTrans.Commit();

                                    String sembolsüz = textBox1.Text.ToString().Remove(textBox1.Text.ToString().Length - 1);

                                    double temp = Convert.ToDouble(sembolsüz);
                                    double value = temp;
                                    temp = (temp / 10);

                                    textBox1.Text = ((value - temp).ToString()) + "₺";

                                    codeButton.Enabled = false;

                                    System.Windows.Forms.MessageBox.Show("Code Successfully Used.");

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


                            }
                            else
                            {
                                throw new System.InvalidOperationException("The Amount of Use of the Coupon Finished.");
                            }
                        }
                        else
                        {
                            throw new System.InvalidOperationException("Coupon is Outdated.");

                        }
                    }


                }
                catch (Exception)
                {
                    System.Windows.Forms.MessageBox.Show("Invalid Code.");
                    
                }
                finally
                {
                    con.Close();

                }
            }
            
            

            

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            con.Open();

            MySqlCommand myCommand = con.CreateCommand();
            MySqlTransaction myTrans;
            
            myTrans = con.BeginTransaction();

            myCommand.Connection = con;
            myCommand.Transaction = myTrans;

            try
            {
                myCommand.CommandText = "UPDATE ShoppingCart SET OrderID = " + get_orderID().ToString() + " WHERE CustomerID = " + userid.ToString() + " AND OrderID = 0";

                myCommand.ExecuteNonQuery();

                myCommand.CommandText = "call insert_orders(?customerid,?orderDate,?address,?paymentType,?totalCost)";
                myCommand.Parameters.Add(new MySqlParameter("customerid", userid));
                myCommand.Parameters.Add(new MySqlParameter("orderDate", DateTime.Now));
                myCommand.Parameters.Add(new MySqlParameter("address", adresText.Text));
                myCommand.Parameters.Add(new MySqlParameter("paymentType", comboBox2.SelectedItem));
                myCommand.Parameters.Add(new MySqlParameter("totalCost", textBox1.Text.Replace(",", ".")));

                myCommand.ExecuteNonQuery();

                myTrans.Commit();

                refreshTable();
                System.Windows.Forms.MessageBox.Show("Your order has been successfully completed.");

                textBox2.Visible = false;
                label2.Visible = false;
                codeButton.Visible = false;
                button2.Visible = false;





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
                codeButton.Enabled = true;
                con.Close();
            }
        }
    }
}
