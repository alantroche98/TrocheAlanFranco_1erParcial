using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ABC_Personas
{
    public partial class Form1 : Form
    {
        // Cadena de conexión a la base de datos
        private string ConnectionString = "server=(local);database=BDAlan;Integrated Security=True;";

        public Form1()
        {
            InitializeComponent();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // Puedes cargar datos iniciales o hacer configuraciones si es necesario
        }

        private void btnAgregar_Click(object sender, EventArgs e)
        {
            AgregarPersona();
        }

        private void AgregarPersona()
        {
            string ci = textBoxCI.Text;
            string nombre = textBoxNombre.Text;
            string paterno = textBoxPaterno.Text;

            string consulta = "INSERT INTO persona (ci, nombre, paterno) VALUES (@ci, @nombre, @paterno)";

            using (SqlConnection conexion = new SqlConnection(ConnectionString))
            {
                SqlCommand cmd = new SqlCommand(consulta, conexion);
                cmd.Parameters.AddWithValue("@ci", ci);
                cmd.Parameters.AddWithValue("@nombre", nombre);
                cmd.Parameters.AddWithValue("@paterno", paterno);

                try
                {
                    conexion.Open();
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                    {
                        MessageBox.Show("Persona agregada correctamente.");
                        LimpiarCampos();
                    }
                    else
                    {
                        MessageBox.Show("Error al agregar la persona.");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }

        private void btnBuscar_Click(object sender, EventArgs e)
        {
            BuscarPersona();
        }
        private void BuscarPersona()
        {
            string ci = textBoxCI.Text;

            string consulta = "SELECT * FROM persona WHERE ci = @ci";

            using (SqlConnection conexion = new SqlConnection(ConnectionString))
            {
                SqlCommand cmd = new SqlCommand(consulta, conexion);
                cmd.Parameters.AddWithValue("@ci", ci);

                try
                {
                    conexion.Open();
                    SqlDataReader reader = cmd.ExecuteReader();
                    if (reader.Read())
                    {
                        textBoxNombre.Text = reader["nombre"].ToString();
                        textBoxPaterno.Text = reader["paterno"].ToString();
                    }
                    else
                    {
                        MessageBox.Show("Persona no encontrada.");
                    }
                    reader.Close();
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }

        private void btnCambiar_Click(object sender, EventArgs e)
        {
            CambiarPersona();
        }
        private void CambiarPersona()
        {
            string ci = textBoxCI.Text;
            string nombre = textBoxNombre.Text;
            string paterno = textBoxPaterno.Text;

            string consulta = "UPDATE persona SET nombre = @nombre, paterno = @paterno WHERE ci = @ci";

            using (SqlConnection conexion = new SqlConnection(ConnectionString))
            {
                SqlCommand cmd = new SqlCommand(consulta, conexion);
                cmd.Parameters.AddWithValue("@ci", ci);
                cmd.Parameters.AddWithValue("@nombre", nombre);
                cmd.Parameters.AddWithValue("@paterno", paterno);

                try
                {
                    conexion.Open();
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                    {
                        MessageBox.Show("Persona actualizada correctamente.");
                        LimpiarCampos();
                    }
                    else
                    {
                        MessageBox.Show("Error al actualizar la persona.");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }

        private void btnBorrar_Click(object sender, EventArgs e)
        {
            BorrarPersona();
        }
        private void BorrarPersona()
        {
            string ci = textBoxCI.Text;

            string consulta = "DELETE FROM persona WHERE ci = @ci";

            using (SqlConnection conexion = new SqlConnection(ConnectionString))
            {
                SqlCommand cmd = new SqlCommand(consulta, conexion);
                cmd.Parameters.AddWithValue("@ci", ci);

                try
                {
                    conexion.Open();
                    int result = cmd.ExecuteNonQuery();
                    if (result > 0)
                    {
                        MessageBox.Show("Persona eliminada correctamente.");
                        LimpiarCampos();
                    }
                    else
                    {
                        MessageBox.Show("Error al eliminar la persona.");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }
        private void btnMostrarPersonas_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Cargando personas...");
            string consulta = "SELECT * FROM persona"; // Cambia esto si necesitas filtrar columnas específicas
            CargarDatos(consulta);
        }

        private void btnMostrarCatastros_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Cargando personas...");
            string consulta = "SELECT * FROM catastro"; // Cambia esto si necesitas filtrar columnas específicas
            CargarDatos(consulta);
        }

        private void CargarDatos(string consulta)
        {
            using (SqlConnection conexion = new SqlConnection(ConnectionString))
            {
                try
                {
                    SqlDataAdapter adaptador = new SqlDataAdapter(consulta, conexion);
                    DataTable dt = new DataTable();

                    conexion.Open();  // Abre la conexión
                    adaptador.Fill(dt);  // Llena el DataTable con los resultados
                    MessageBox.Show($"Filas cargadas: {dt.Rows.Count}");  // Mensaje de depuración
                    dataGridView1.DataSource = dt;  // Asigna el DataTable al DataGridView
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }





        private void LimpiarCampos()
        {
            textBoxCI.Clear();
            textBoxNombre.Clear();
            textBoxPaterno.Clear();
        }
    }
}

