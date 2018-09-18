namespace HNA_Hospital
{
    partial class HeartBeat
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
            this.components = new System.ComponentModel.Container();
            this.HR = new System.Windows.Forms.Button();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.HeartBeatLabel = new System.Windows.Forms.Label();
            this.nameLabel = new System.Windows.Forms.Label();
            this.finish = new System.Windows.Forms.Button();
            this.ard = new System.IO.Ports.SerialPort(this.components);
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // HR
            // 
            this.HR.BackColor = System.Drawing.Color.Snow;
            this.HR.ForeColor = System.Drawing.Color.LightCoral;
            this.HR.Location = new System.Drawing.Point(511, 126);
            this.HR.Name = "HR";
            this.HR.Size = new System.Drawing.Size(240, 67);
            this.HR.TabIndex = 0;
            this.HR.Text = "Measure";
            this.HR.UseVisualStyleBackColor = false;
            this.HR.Click += new System.EventHandler(this.HR_Click);
            // 
            // textBox1
            // 
            this.textBox1.Location = new System.Drawing.Point(254, 134);
            this.textBox1.Name = "textBox1";
            this.textBox1.Size = new System.Drawing.Size(251, 47);
            this.textBox1.TabIndex = 2;
            // 
            // HeartBeatLabel
            // 
            this.HeartBeatLabel.AutoSize = true;
            this.HeartBeatLabel.BackColor = System.Drawing.Color.Transparent;
            this.HeartBeatLabel.Font = new System.Drawing.Font("Georgia", 27.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.HeartBeatLabel.ForeColor = System.Drawing.Color.LightCoral;
            this.HeartBeatLabel.Location = new System.Drawing.Point(15, 137);
            this.HeartBeatLabel.Name = "HeartBeatLabel";
            this.HeartBeatLabel.Size = new System.Drawing.Size(239, 43);
            this.HeartBeatLabel.TabIndex = 3;
            this.HeartBeatLabel.Text = "Heart Beat:";
            this.HeartBeatLabel.Click += new System.EventHandler(this.HeartBeatLabel_Click);
            // 
            // nameLabel
            // 
            this.nameLabel.AutoSize = true;
            this.nameLabel.BackColor = System.Drawing.Color.Transparent;
            this.nameLabel.Font = new System.Drawing.Font("Georgia", 27.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.nameLabel.ForeColor = System.Drawing.Color.LightCoral;
            this.nameLabel.Location = new System.Drawing.Point(196, 13);
            this.nameLabel.Name = "nameLabel";
            this.nameLabel.Size = new System.Drawing.Size(124, 43);
            this.nameLabel.TabIndex = 4;
            this.nameLabel.Text = "Hello";
            // 
            // finish
            // 
            this.finish.BackColor = System.Drawing.Color.LightCoral;
            this.finish.ForeColor = System.Drawing.Color.Snow;
            this.finish.Location = new System.Drawing.Point(525, 417);
            this.finish.Name = "finish";
            this.finish.Size = new System.Drawing.Size(196, 67);
            this.finish.TabIndex = 5;
            this.finish.Text = "Finish";
            this.finish.UseVisualStyleBackColor = false;
            this.finish.Click += new System.EventHandler(this.finish_Click);
            // 
            // ard
            // 
            this.ard.PortName = "COM5";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(0, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(0, 41);
            this.label1.TabIndex = 6;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.BackColor = System.Drawing.Color.Snow;
            this.label2.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.label2.Font = new System.Drawing.Font("Georgia", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.LightCoral;
            this.label2.Location = new System.Drawing.Point(45, 71);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(686, 36);
            this.label2.TabIndex = 7;
            this.label2.Text = "Please hold with your thumb the white heart ";
            // 
            // HeartBeat
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(24F, 41F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = global::HNA_Hospital.Properties.Resources._35548;
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(771, 496);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.finish);
            this.Controls.Add(this.nameLabel);
            this.Controls.Add(this.HeartBeatLabel);
            this.Controls.Add(this.textBox1);
            this.Controls.Add(this.HR);
            this.Font = new System.Drawing.Font("Georgia", 26.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Margin = new System.Windows.Forms.Padding(12, 9, 12, 9);
            this.Name = "HeartBeat";
            this.Text = "Heart Beat";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button HR;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.Label HeartBeatLabel;
        private System.Windows.Forms.Label nameLabel;
        private System.Windows.Forms.Button finish;
        private System.IO.Ports.SerialPort ard;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
    }
}