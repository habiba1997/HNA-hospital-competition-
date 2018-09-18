using System;
using System.Windows.Forms;
using System.Data;
using MySql.Data.MySqlClient;
using System.Collections.Generic;

namespace HNA_Hospital
{

    public partial class CardNumber : Form
    {
      
        public string patientID;
        public string patientFN;
        patient CN = new patient();


        public CardNumber()
        {
            InitializeComponent();
            CN.Initialize();
        }
        
        private void button1_Click(object sender, EventArgs e)
        {
            string enterId = textBox1.Text;
            string query = "SELECT `ID Card`, `First Name`, `Last Name` FROM `Data` ";
            int check = 0;

            //Open connection
            if (CN.OpenConnection() == true)
            {
                //Create Command
                MySqlCommand cmd = new MySqlCommand(query, CN.connection);
                //Create a data reader and Execute the command
                MySqlDataReader dataReader = cmd.ExecuteReader();

                //Read the data and store them in the list
                while (dataReader.Read())
                {
                    if (dataReader["ID Card"].ToString() == enterId)
                    {
                        HNA_Hospital.HeartBeat HBeat = new HNA_Hospital.HeartBeat();
                        patientID = dataReader["ID Card"].ToString();
                        patientFN = dataReader["First Name"].ToString() + " " + dataReader["Last Name"].ToString();
                        check = 1;

                        HBeat.PatientFirstName = patientFN;
                        HBeat.Patientid = patientID;

                        this.Hide();
                        HBeat.Show();
                        break;
                    }

                }
                if (check == 0)
                {
                    MessageBox.Show("Wrong Patient ID ", MessageBoxIcon.Error.ToString());
                }

                dataReader.Close();

                CN.CloseConnection();

            }
        }
    }
}
