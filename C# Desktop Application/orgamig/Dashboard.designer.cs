namespace orgamig
{
    partial class Dashboard
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
            System.Windows.Forms.Button ShoppingCartButton;
            System.Windows.Forms.Button ProfileButton;
            System.Windows.Forms.Button OrdersButton;
            System.Windows.Forms.Button manufacturerButon;
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Dashboard));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.SideBar = new System.Windows.Forms.Panel();
            this.ProductsButton = new System.Windows.Forms.Button();
            this.panel1 = new System.Windows.Forms.Panel();
            this.exitButton = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.panelContainer = new System.Windows.Forms.Panel();
            this.dashboardUserControl1 = new orgamig.DashboardUserControl();
            this.button1 = new System.Windows.Forms.Button();
            this.backgroundWorker1 = new System.ComponentModel.BackgroundWorker();
            this.dashboardUserControl2 = new orgamig.DashboardUserControl();
            this.dashboardProducts1 = new orgamig.DashboardProducts1();
            this.dashboardOrders1 = new orgamig.DashboardOrders();
            this.dashboardShoppingCart1 = new orgamig.DashboardShoppingCart();
            this.dashboardManufacturers1 = new orgamig.DashboardManufacturers();
            this.dashboardProfile1 = new orgamig.DashboardProfile();
            ShoppingCartButton = new System.Windows.Forms.Button();
            ProfileButton = new System.Windows.Forms.Button();
            OrdersButton = new System.Windows.Forms.Button();
            manufacturerButon = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SideBar.SuspendLayout();
            this.panel1.SuspendLayout();
            this.panelContainer.SuspendLayout();
            this.SuspendLayout();
            // 
            // ShoppingCartButton
            // 
            ShoppingCartButton.BackColor = System.Drawing.SystemColors.Control;
            ShoppingCartButton.FlatAppearance.BorderSize = 0;
            ShoppingCartButton.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            ShoppingCartButton.ForeColor = System.Drawing.Color.LightCoral;
            ShoppingCartButton.Location = new System.Drawing.Point(0, 299);
            ShoppingCartButton.Name = "ShoppingCartButton";
            ShoppingCartButton.Size = new System.Drawing.Size(187, 75);
            ShoppingCartButton.TabIndex = 6;
            ShoppingCartButton.Text = "Shopping Cart";
            ShoppingCartButton.UseVisualStyleBackColor = false;
            ShoppingCartButton.Click += new System.EventHandler(this.ShoppingCartButton_Click);
            // 
            // ProfileButton
            // 
            ProfileButton.BackColor = System.Drawing.SystemColors.Control;
            ProfileButton.FlatAppearance.BorderSize = 0;
            ProfileButton.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            ProfileButton.ForeColor = System.Drawing.Color.LightCoral;
            ProfileButton.Location = new System.Drawing.Point(0, 542);
            ProfileButton.Name = "ProfileButton";
            ProfileButton.Size = new System.Drawing.Size(187, 75);
            ProfileButton.TabIndex = 7;
            ProfileButton.Text = "Profile";
            ProfileButton.UseVisualStyleBackColor = false;
            ProfileButton.Click += new System.EventHandler(this.ProfileButton_Click);
            // 
            // OrdersButton
            // 
            OrdersButton.BackColor = System.Drawing.SystemColors.Control;
            OrdersButton.FlatAppearance.BorderSize = 0;
            OrdersButton.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            OrdersButton.ForeColor = System.Drawing.Color.LightCoral;
            OrdersButton.Location = new System.Drawing.Point(0, 380);
            OrdersButton.Name = "OrdersButton";
            OrdersButton.Size = new System.Drawing.Size(187, 75);
            OrdersButton.TabIndex = 8;
            OrdersButton.Text = "My Orders";
            OrdersButton.UseVisualStyleBackColor = false;
            OrdersButton.Click += new System.EventHandler(this.OrdersButton_Click);
            // 
            // manufacturerButon
            // 
            manufacturerButon.BackColor = System.Drawing.SystemColors.Control;
            manufacturerButon.FlatAppearance.BorderSize = 0;
            manufacturerButon.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            manufacturerButon.ForeColor = System.Drawing.Color.LightCoral;
            manufacturerButon.Location = new System.Drawing.Point(0, 461);
            manufacturerButon.Name = "manufacturerButon";
            manufacturerButon.Size = new System.Drawing.Size(187, 75);
            manufacturerButon.TabIndex = 9;
            manufacturerButon.Text = "Manufacturers";
            manufacturerButon.UseVisualStyleBackColor = false;
            manufacturerButon.Click += new System.EventHandler(this.manufacturerButon_Click);
            // 
            // pictureBox1
            // 
            this.pictureBox1.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left)));
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(29, 14);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(118, 176);
            this.pictureBox1.TabIndex = 0;
            this.pictureBox1.TabStop = false;
            this.pictureBox1.Click += new System.EventHandler(this.pictureBox1_Click);
            // 
            // SideBar
            // 
            this.SideBar.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.SideBar.BackColor = System.Drawing.Color.LightCoral;
            this.SideBar.Controls.Add(manufacturerButon);
            this.SideBar.Controls.Add(OrdersButton);
            this.SideBar.Controls.Add(ProfileButton);
            this.SideBar.Controls.Add(ShoppingCartButton);
            this.SideBar.Controls.Add(this.ProductsButton);
            this.SideBar.Controls.Add(this.pictureBox1);
            this.SideBar.Location = new System.Drawing.Point(0, -2);
            this.SideBar.Name = "SideBar";
            this.SideBar.Size = new System.Drawing.Size(187, 726);
            this.SideBar.TabIndex = 3;
            this.SideBar.Paint += new System.Windows.Forms.PaintEventHandler(this.panel2_Paint);
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
            this.ProductsButton.Click += new System.EventHandler(this.button2_Click);
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.LightCoral;
            this.panel1.Controls.Add(this.exitButton);
            this.panel1.Controls.Add(this.button2);
            this.panel1.Controls.Add(this.label1);
            this.panel1.Controls.Add(this.panelContainer);
            this.panel1.Controls.Add(this.button1);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel1.Location = new System.Drawing.Point(0, 0);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(1061, 117);
            this.panel1.TabIndex = 4;
            this.panel1.Paint += new System.Windows.Forms.PaintEventHandler(this.panel1_Paint);
            // 
            // exitButton
            // 
            this.exitButton.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.exitButton.Cursor = System.Windows.Forms.Cursors.Hand;
            this.exitButton.FlatAppearance.BorderSize = 0;
            this.exitButton.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.exitButton.Image = ((System.Drawing.Image)(resources.GetObject("exitButton.Image")));
            this.exitButton.Location = new System.Drawing.Point(797, 19);
            this.exitButton.Name = "exitButton";
            this.exitButton.Size = new System.Drawing.Size(93, 81);
            this.exitButton.TabIndex = 8;
            this.exitButton.UseVisualStyleBackColor = true;
            this.exitButton.Click += new System.EventHandler(this.exitButton_Click);
            // 
            // button2
            // 
            this.button2.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.button2.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button2.FlatAppearance.BorderSize = 0;
            this.button2.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button2.Image = ((System.Drawing.Image)(resources.GetObject("button2.Image")));
            this.button2.Location = new System.Drawing.Point(896, 23);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(67, 69);
            this.button2.TabIndex = 7;
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.button2_Click_1);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Ink Free", 40F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.SystemColors.ButtonHighlight;
            this.label1.Location = new System.Drawing.Point(210, 25);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(258, 67);
            this.label1.TabIndex = 6;
            this.label1.Text = "orgaMIG";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // panelContainer
            // 
            this.panelContainer.Controls.Add(this.dashboardUserControl1);
            this.panelContainer.Location = new System.Drawing.Point(187, 113);
            this.panelContainer.Name = "panelContainer";
            this.panelContainer.Size = new System.Drawing.Size(874, 491);
            this.panelContainer.TabIndex = 5;
            // 
            // dashboardUserControl1
            // 
            this.dashboardUserControl1.BackColor = System.Drawing.Color.White;
            this.dashboardUserControl1.Location = new System.Drawing.Point(0, 0);
            this.dashboardUserControl1.Name = "dashboardUserControl1";
            this.dashboardUserControl1.Size = new System.Drawing.Size(874, 571);
            this.dashboardUserControl1.TabIndex = 0;
            // 
            // button1
            // 
            this.button1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.button1.Cursor = System.Windows.Forms.Cursors.Hand;
            this.button1.FlatAppearance.BorderSize = 0;
            this.button1.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button1.Image = ((System.Drawing.Image)(resources.GetObject("button1.Image")));
            this.button1.Location = new System.Drawing.Point(969, 25);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(80, 69);
            this.button1.TabIndex = 1;
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // dashboardUserControl2
            // 
            this.dashboardUserControl2.BackColor = System.Drawing.Color.White;
            this.dashboardUserControl2.Location = new System.Drawing.Point(187, 110);
            this.dashboardUserControl2.Name = "dashboardUserControl2";
            this.dashboardUserControl2.Size = new System.Drawing.Size(874, 611);
            this.dashboardUserControl2.TabIndex = 5;
            this.dashboardUserControl2.Load += new System.EventHandler(this.dashboardUserControl2_Load);
            // 
            // dashboardProducts1
            // 
            this.dashboardProducts1.Location = new System.Drawing.Point(187, 113);
            this.dashboardProducts1.Name = "dashboardProducts1";
            this.dashboardProducts1.Size = new System.Drawing.Size(874, 611);
            this.dashboardProducts1.TabIndex = 6;
            this.dashboardProducts1.Load += new System.EventHandler(this.dashboardProducts1_Load);
            // 
            // dashboardOrders1
            // 
            this.dashboardOrders1.Location = new System.Drawing.Point(187, 113);
            this.dashboardOrders1.Name = "dashboardOrders1";
            this.dashboardOrders1.Size = new System.Drawing.Size(874, 611);
            this.dashboardOrders1.TabIndex = 7;
            this.dashboardOrders1.Load += new System.EventHandler(this.dashboardOrders1_Load_2);
            // 
            // dashboardShoppingCart1
            // 
            this.dashboardShoppingCart1.Location = new System.Drawing.Point(187, 110);
            this.dashboardShoppingCart1.Name = "dashboardShoppingCart1";
            this.dashboardShoppingCart1.Size = new System.Drawing.Size(874, 611);
            this.dashboardShoppingCart1.TabIndex = 10;
            // 
            // dashboardManufacturers1
            // 
            this.dashboardManufacturers1.Location = new System.Drawing.Point(187, 110);
            this.dashboardManufacturers1.Name = "dashboardManufacturers1";
            this.dashboardManufacturers1.Size = new System.Drawing.Size(874, 611);
            this.dashboardManufacturers1.TabIndex = 11;
            // 
            // dashboardProfile1
            // 
            this.dashboardProfile1.Location = new System.Drawing.Point(187, 110);
            this.dashboardProfile1.Name = "dashboardProfile1";
            this.dashboardProfile1.Size = new System.Drawing.Size(874, 611);
            this.dashboardProfile1.TabIndex = 12;
            // 
            // Dashboard
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1061, 724);
            this.Controls.Add(this.dashboardUserControl2);
            this.Controls.Add(this.dashboardProducts1);
            this.Controls.Add(this.SideBar);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.dashboardOrders1);
            this.Controls.Add(this.dashboardShoppingCart1);
            this.Controls.Add(this.dashboardManufacturers1);
            this.Controls.Add(this.dashboardProfile1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "Dashboard";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Dashboard";
            this.Load += new System.EventHandler(this.Dashboard_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.SideBar.ResumeLayout(false);
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.panelContainer.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Panel SideBar;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button ProductsButton;
        private System.Windows.Forms.Panel panelContainer;
        private System.ComponentModel.BackgroundWorker backgroundWorker1;
        private DashboardUserControl dashboardUserControl1;
        private System.Windows.Forms.Label label1;
        private DashboardUserControl dashboardUserControl2;
        private DashboardProducts1 dashboardProducts1;
        private System.Windows.Forms.Button button2;
        private DashboardOrders dashboardOrders1;
        private System.Windows.Forms.Button exitButton;
        private DashboardShoppingCart dashboardShoppingCart1;
        private DashboardManufacturers dashboardManufacturers1;
        private DashboardProfile dashboardProfile1;
        
    }
}