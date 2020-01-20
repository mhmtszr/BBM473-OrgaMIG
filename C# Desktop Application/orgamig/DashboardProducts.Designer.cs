namespace orgamig
{
    partial class DashboardProducts1
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

        #region Component Designer generated code

        /// <summary> 
        /// Required method for Designer support - do not modify 
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.stokText = new System.Windows.Forms.TextBox();
            this.stokLabel = new System.Windows.Forms.Label();
            this.addCartButton = new System.Windows.Forms.Button();
            this.comboBox1 = new System.Windows.Forms.ComboBox();
            this.label1 = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // dataGridView1
            // 
            this.dataGridView1.AllowUserToAddRows = false;
            this.dataGridView1.AllowUserToDeleteRows = false;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Location = new System.Drawing.Point(0, 0);
            this.dataGridView1.MultiSelect = false;
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.ReadOnly = true;
            this.dataGridView1.Size = new System.Drawing.Size(874, 424);
            this.dataGridView1.TabIndex = 0;
            this.dataGridView1.CellClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellClick);
            this.dataGridView1.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            this.dataGridView1.CellContentDoubleClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentDoubleClick);
            // 
            // stokText
            // 
            this.stokText.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.stokText.Location = new System.Drawing.Point(364, 520);
            this.stokText.Name = "stokText";
            this.stokText.Size = new System.Drawing.Size(176, 31);
            this.stokText.TabIndex = 3;
            // 
            // stokLabel
            // 
            this.stokLabel.AutoSize = true;
            this.stokLabel.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.stokLabel.ForeColor = System.Drawing.Color.LightCoral;
            this.stokLabel.Location = new System.Drawing.Point(360, 474);
            this.stokLabel.Name = "stokLabel";
            this.stokLabel.Size = new System.Drawing.Size(180, 23);
            this.stokLabel.TabIndex = 4;
            this.stokLabel.Text = "Amount of Product";
            this.stokLabel.Click += new System.EventHandler(this.label1_Click);
            // 
            // addCartButton
            // 
            this.addCartButton.BackColor = System.Drawing.Color.LightCoral;
            this.addCartButton.FlatAppearance.BorderSize = 0;
            this.addCartButton.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.addCartButton.ForeColor = System.Drawing.Color.White;
            this.addCartButton.Location = new System.Drawing.Point(613, 493);
            this.addCartButton.Name = "addCartButton";
            this.addCartButton.Size = new System.Drawing.Size(218, 58);
            this.addCartButton.TabIndex = 1;
            this.addCartButton.Text = "ADD TO CART";
            this.addCartButton.UseVisualStyleBackColor = false;
            this.addCartButton.Click += new System.EventHandler(this.button1_Click);
            // 
            // comboBox1
            // 
            this.comboBox1.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.comboBox1.FormattingEnabled = true;
            this.comboBox1.Items.AddRange(new object[] {
            "Milk and Milk Products",
            "Fruits and Vegetables",
            "Food of Animal Origin"});
            this.comboBox1.Location = new System.Drawing.Point(59, 521);
            this.comboBox1.Name = "comboBox1";
            this.comboBox1.Size = new System.Drawing.Size(267, 30);
            this.comboBox1.TabIndex = 5;
            this.comboBox1.SelectedIndexChanged += new System.EventHandler(this.comboBox1_SelectedIndexChanged);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Century Gothic", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label1.ForeColor = System.Drawing.Color.LightCoral;
            this.label1.Location = new System.Drawing.Point(55, 474);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(138, 23);
            this.label1.TabIndex = 6;
            this.label1.Text = "Product Types";
            // 
            // DashboardProducts1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.label1);
            this.Controls.Add(this.comboBox1);
            this.Controls.Add(this.stokLabel);
            this.Controls.Add(this.stokText);
            this.Controls.Add(this.addCartButton);
            this.Controls.Add(this.dataGridView1);
            this.Name = "DashboardProducts1";
            this.Size = new System.Drawing.Size(874, 611);
            this.Load += new System.EventHandler(this.DashboardProducts_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.TextBox stokText;
        private System.Windows.Forms.Label stokLabel;
        private System.Windows.Forms.Button addCartButton;
        private System.Windows.Forms.ComboBox comboBox1;
        private System.Windows.Forms.Label label1;
    }
}
