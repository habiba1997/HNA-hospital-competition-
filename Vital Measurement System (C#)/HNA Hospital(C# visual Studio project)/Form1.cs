using System;
using System.Windows.Forms;

namespace HNA_Hospital
{
    public partial class Welcome1 : Form
    {
        public Welcome1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            HNA_Hospital.CardNumber form2 = new HNA_Hospital.CardNumber();
            form2.Show();
        }
    }
}
