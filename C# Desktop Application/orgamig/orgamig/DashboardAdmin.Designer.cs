namespace orgamig
{
    partial class DashboardAdmin
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.Windows.Forms.Button manufacturerButon;
            System.Windows.Forms.Button button3;
            System.Windows.Forms.Button button4;
            System.Windows.Forms.Button button5;
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(DashboardAdmin));
            this.SideBar = new System.Windows.Forms.Panel();
            this.ProductsButton = new System.Windows.Forms.Button();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.panel1 = new System.Windows.Forms.Panel();
            this.button6 = new System.Windows.Forms.Button();
            this.button1 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.exitButton = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.panel2 = new System.Windows.Forms.Panel();
            this.dashboardUserControl1 = new orgamig.DashboardUserControl();
            this.dashboardAdminProducts1 = new orgamig.DashboardAdminProducts();
            this.dashboardAdminManufacturers1 = new orgamig.DashboardAdminManufacturers();
            this.dashboardAdminCustomers1 = new orgamig.DashboardAdminCustomers();
            this.dashboardAdminDiscountCodes1 = new orgamig.DashboardAdminDiscountCodes();
            this.dashboardAdminComments1 = new orgamig.DashboardAdminComments();
            manufacturerButon = new System.Windows.Forms.Button();
            button3 = new System.Windows.Forms.Button();
            button4 = new System.Windows.Forms.Button();
            button5 = new System.Windows.Forms.Button();
            this.SideBar.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.panel1.SuspendLayout();
            this.panel2.SuspendLayout();
            this.SuspendLayout();
            // 
            // manufacturerButon
            // 
            manufacturerButon.BackColor = System.Drawing.SystemColors.Control;
            manufacturerButon.FlatAppearance.BorderSize = 0;
            manufacturerButon.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            manufacturerButon.ForeColor = System.Drawing.Color.LightCoral;
            manufacturerButon.Location = new System.Drawing.Point(0, 299);
            manufacturerButon.Name = "manufacturerButon";
            manufacturerButon.Size = new System.Drawing.Size(187, 75);
            manufacturerButon.TabIndex = 9;
            manufacturerButon.Text = "Manufacturers";
            manufacturerButon.UseVisualStyleBackColor = false;
            manufacturerButon.Click += new System.EventHandler(this.manufacturerButon_Click);
            // 
            // button3
            // 
            button3.BackColor = System.Drawing.SystemColors.Control;
            button3.FlatAppearance.BorderSize = 0;
            button3.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            button3.ForeColor = System.Drawing.Color.LightCoral;
            button3.Location = new System.Drawing.Point(0, 380);
            button3.Name = "button3";
            button3.Size = new System.Drawing.Size(187, 75);
            button3.TabIndex = 10;
            button3.Text = "Customers";
            button3.UseVisualStyleBackColor = false;
            button3.Click += new System.EventHandler(this.button3_Click);
            // 
            // button4
            // 
            button4.BackColor = System.Drawing.SystemColors.Control;
            button4.FlatAppearance.BorderSize = 0;
            button4.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            button4.ForeColor = System.Drawing.Color.LightCoral;
            button4.Location = new System.Drawing.Point(0, 461);
            button4.Name = "button4";
            button4.Size = new System.Drawing.Size(187, 75);
            button4.TabIndex = 11;
            button4.Text = "Comments";
            button4.UseVisualStyleBackColor = false;
            button4.Click += new System.EventHandler(this.button4_Click);
            // 
            // button5
            // 
            button5.BackColor = System.Drawing.SystemColors.Control;
            button5.FlatAppearance.BorderSize = 0;
            button5.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            button5.ForeColor = System.Drawing.Color.LightCoral;
            button5.Location = new System.Drawing.Point(0, 542);
            button5.Name = "button5";
            button5.Size = new System.Drawing.Size(187, 75);
            button5.TabIndex = 12;
            button5.Text = "Discount Codes";
            button5.UseVisualStyleBackColor = false;
            button5.Click += new System.EventHandler(this.button5_Click);
            // 
            // SideBar
            // 
            this.SideBar.BackColor = System.Drawing.Color.LightCoral;
            this.SideBar.Controls.Add(button5);
            this.SideBar.Controls.Add(button4);
            this.SideBar.Controls.Add(button3);
            this.SideBar.Controls.Add(manufacturerButon);
            this.SideBar.Controls.Add(this.ProductsButton);
            this.SideBar.Controls.Add(this.pictureBox1);
            this.SideBar.Dock = System.Windows.Forms.DockStyle.Left;
            this.SideBar.Location = new System.Drawing.Point(0, 0);
            this.SideBar.Name = "SideBar";
            this.SideBar.Size = new System.Drawing.Size(187, 724);
            this.SideBar.TabIndex = 4;
            // 
            // ProductsButton
            // 
            this.ProductsButton.BackColor = System.Drawing.SystemColors.Control;
            this.ProductsButton.FlatAppearance.BorderSize = 0;
            this.ProductsButton.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.ProductsButton.ForeColor = System.Drawing.Color.LightCoral;
            this.ProductsButton.Location = new System.Drawing.Point(0, 218);
            this.ProductsButton.Name = "ProductsButton";
            this.ProductsButton.Size = new System.Drawing.Size(187, 75);
            this.ProductsButton.TabIndex = 5;
            this.ProductsButton.Text = "Products";
            this.ProductsButton.UseVisualStyleBackColor = false;
            this.ProductsButton.Click += new System.EventHandler(this.ProductsButton_Click);
            // 
            // pictureBox1
            // 
            this.pictureBox1.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left)));
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(29, 14);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(118, 174);
            this.pictureBox1.TabIndex = 0;
            this.pictureBox1.TabStop = false;
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.LightCoral;
            this.panel1.Controls.Add(this.button6);
            this.panel1.Controls.Add(this.button1);
            this.panel1.Controls.Add(this.button2);
            this.panel1.Controls.Add(this.exitButton);
            this.panel1.Controls.Add(this.label1);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel1.Location = new System.Drawing.Point(187, 0);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(874, 117);
            this.panel1.TabIndex = 5;
            // 
            // button6
            // 
            this.button6.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.button6.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button6.FlatAppearance.BorderSize = 0;
            this.button6.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button6.Image = ((System.Drawing.Image)(resources.GetObject("button6.Image")));
            this.button6.Location = new System.Drawing.Point(511, 18);
            this.button6.Name = "button6";
            this.button6.Size = new System.Drawing.Size(93, 81);
            this.button6.TabIndex = 12;
            this.button6.UseVisualStyleBackColor = true;
            this.button6.Click += new System.EventHandler(this.button6_Click);
            // 
            // button1
            // 
            this.button1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.button1.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button1.FlatAppearance.BorderSize = 0;
            this.button1.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button1.Image = ((System.Drawing.Image)(resources.GetObject("button1.Image")));
            this.button1.Location = new System.Drawing.Point(782, 24);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(80, 69);
            this.button1.TabIndex = 11;
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // button2
            // 
            this.button2.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.button2.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button2.FlatAppearance.BorderSize = 0;
            this.button2.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button2.Image = ((System.Drawing.Image)(resources.GetObject("button2.Image")));
            this.button2.Location = new System.Drawing.Point(709, 24);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(67, 69);
            this.button2.TabIndex = 10;
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.button2_Click);
            // 
            // exitButton
            // 
            this.exitButton.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.exitButton.Cursor = System.Windows.Forms.Cursors.Hand;
            this.exitButton.FlatAppearance.BorderSize = 0;
            this.exitButton.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.exitButton.Image = ((System.Drawing.Image)(resources.GetObject("exitButton.Image")));
            this.exitButton.Location = new System.Drawing.Point(610, 18);
            this.exitButton.Name = "exitButton";
            this.exitButton.Size = new System.Drawing.Size(93, 81);
            this.exitButton.TabIndex = 9;
            this.exitButton.UseVisualStyleBackColor = true;
            this.exitButton.Click += new System.EventHandler(this.exitButton_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Ink Free", 40F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.label1.Location = new System.Drawing.Point(32, 26);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(258, 67);
            this.label1.TabIndex = 7;
            this.label1.Text = "orgaMIG";
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.dashboardUserControl1);
            this.panel2.Controls.Add(this.dashboardAdminProducts1);
            this.panel2.Controls.Add(this.dashboardAdminManufacturers1);
            this.panel2.Controls.Add(this.dashboardAdminCustomers1);
            this.panel2.Controls.Add(this.dashboardAdminDiscountCodes1);
            this.panel2.Controls.Add(this.dashboardAdminComments1);
            this.panel2.Location = new System.Drawing.Point(187, 115);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(874, 609);
            this.panel2.TabIndex = 12;
            // 
            // dashboardUserControl1
            // 
            this.dashboardUserControl1.BackColor = System.Drawing.Color.White;
            this.dashboardUserControl1.Location = new System.Drawing.Point(0, 0);
            this.dashboardUserControl1.Name = "dashboardUserControl1";
            this.dashboardUserControl1.Size = new System.Drawing.Size(874, 609);
            this.dashboardUserControl1.TabIndex = 1;
            this.dashboardUserControl1.Load += new System.EventHandler(this.dashboardUserControl1_Load);
            // 
            // dashboardAdminProducts1
            // 
            this.dashboardAdminProducts1.Location = new System.Drawing.Point(0, 0);
            this.dashboardAdminProducts1.Name = "dashboardAdminProducts1";
            this.dashboardAdminProducts1.Size = new System.Drawing.Size(874, 609);
            this.dashboardAdminProducts1.TabIndex = 0;
            // 
            // dashboardAdminManufacturers1
            // 
            this.dashboardAdminManufacturers1.Location = new System.Drawing.Point(0, 0);
            this.dashboardAdminManufacturers1.Name = "dashboardAdminManufacturers1";
            this.dashboardAdminManufacturers1.Size = new System.Drawing.Size(874, 609);
            this.dashboardAdminManufacturers1.TabIndex = 13;
            // 
            // dashboardAdminCustomers1
            // 
            this.dashboardAdminCustomers1.Location = new System.Drawing.Point(0, 0);
            this.dashboardAdminCustomers1.Name = "dashboardAdminCustomers1";
            this.dashboardAdminCustomers1.Size = new System.Drawing.Size(874, 609);
            this.dashboardAdminCustomers1.TabIndex = 14;
            // 
            // dashboardAdminDiscountCodes1
            // 
            this.dashboardAdminDiscountCodes1.Location = new System.Drawing.Point(0, 0);
            this.dashboardAdminDiscountCodes1.Name = "dashboardAdminDiscountCodes1";
            this.dashboardAdminDiscountCodes1.Size = new System.Drawing.Size(874, 609);
            this.dashboardAdminDiscountCodes1.TabIndex = 15;
            // 
            // dashboardAdminComments1
            // 
            this.dashboardAdminComments1.Location = new System.Drawing.Point(0, 0);
            this.dashboardAdminComments1.Name = "dashboardAdminComments1";
            this.dashboardAdminComments1.Size = new System.Drawing.Size(874, 609);
            this.dashboardAdminComments1.TabIndex = 16;
            // 
            // DashboardAdmin
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1061, 724);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.SideBar);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "DashboardAdmin";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Admin Dashboard";
            this.SideBar.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.panel2.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel SideBar;
        private System.Windows.Forms.Button ProductsButton;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button exitButton;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Panel panel2;
        private DashboardAdminProducts dashboardAdminProducts1;
        private DashboardUserControl dashboardUserControl1;
        private DashboardAdminManufacturers dashboardAdminManufacturers1;
        private DashboardAdminCustomers dashboardAdminCustomers1;
        private DashboardAdminDiscountCodes dashboardAdminDiscountCodes1;
        private DashboardAdminComments dashboardAdminComments1;
        private System.Windows.Forms.Button button6;
    }
}