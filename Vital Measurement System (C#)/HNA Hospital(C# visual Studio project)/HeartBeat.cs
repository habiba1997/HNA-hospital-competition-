using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HNA_Hospital
{
    public partial class HeartBeat : Form
    {
        public string PatientFirstName { get; internal set; }
        public string Patientid { get; internal set; }
        patient PR = new patient();
        public string data;
        public int error = 0;
        public HeartBeat()
        {

            InitializeComponent();
            PR.Initialize();


        }


        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void HR_Click(object sender, EventArgs e)
        {
            nameLabel.Text = "Hello " + PatientFirstName;
            ard.Open();
            ard.WriteLine("2");
            while(error == 0 )
            {
                try
                {
                    data = ard.ReadLine();
                    error = 1;
                }
                catch (Exception exx)
                {
                    MessageBox.Show("Please Place your Thumb Correctly on White Heart");
                }
            }
            
            textBox1.Invoke(new EventHandler(delegate { textBox1.Text = data; }));
           if (PR.OpenConnection() == true)
            {

                MySqlCommand cmd = new MySqlCommand();

                cmd.CommandText = "UPDATE `Data` SET `Pulse`= @PR WHERE `ID Card`= @ID";
                cmd.Parameters.AddWithValue("@PR", int.Parse(data));
                cmd.Parameters.AddWithValue("@ID", Patientid);
                cmd.Connection = PR.connection;
                cmd.ExecuteNonQuery();
                PR.CloseConnection();
                ard.Close();

            }
            
        }

        private void HeartBeatLabel_Click(object sender, EventArgs e)
        {

        }

        private void finish_Click(object sender, EventArgs e)
        {
 
            HNA_Hospital.Welcome1 start = new HNA_Hospital.Welcome1();    
            this.Hide();
            start.Show();
            
        }
    }
}
