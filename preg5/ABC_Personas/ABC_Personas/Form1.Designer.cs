namespace ABC_Personas
{
    partial class Form1
    {
        /// <summary>
        /// Variable del diseñador requerida.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén utilizando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben eliminar; false en caso contrario.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido del método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.textBoxCI = new System.Windows.Forms.TextBox();
            this.textBoxNombre = new System.Windows.Forms.TextBox();
            this.textBoxPaterno = new System.Windows.Forms.TextBox();
            this.btnAgregar = new System.Windows.Forms.Button();
            this.btnBuscar = new System.Windows.Forms.Button();
            this.btnCambiar = new System.Windows.Forms.Button();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.btnBorrar = new System.Windows.Forms.Button();
            this.btnMostrarPersonas = new System.Windows.Forms.Button();
            this.btnMostrarCatastros = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // textBoxCI
            // 
            this.textBoxCI.Location = new System.Drawing.Point(83, 124);
            this.textBoxCI.Name = "textBoxCI";
            this.textBoxCI.Size = new System.Drawing.Size(100, 22);
            this.textBoxCI.TabIndex = 0;
            // 
            // textBoxNombre
            // 
            this.textBoxNombre.Location = new System.Drawing.Point(83, 169);
            this.textBoxNombre.Name = "textBoxNombre";
            this.textBoxNombre.Size = new System.Drawing.Size(100, 22);
            this.textBoxNombre.TabIndex = 1;
            // 
            // textBoxPaterno
            // 
            this.textBoxPaterno.Location = new System.Drawing.Point(83, 214);
            this.textBoxPaterno.Name = "textBoxPaterno";
            this.textBoxPaterno.Size = new System.Drawing.Size(100, 22);
            this.textBoxPaterno.TabIndex = 2;
            // 
            // btnAgregar
            // 
            this.btnAgregar.Location = new System.Drawing.Point(522, 384);
            this.btnAgregar.Name = "btnAgregar";
            this.btnAgregar.Size = new System.Drawing.Size(75, 35);
            this.btnAgregar.TabIndex = 3;
            this.btnAgregar.Text = "Agregar";
            this.btnAgregar.UseVisualStyleBackColor = true;
            this.btnAgregar.Click += new System.EventHandler(this.btnAgregar_Click);
            // 
            // btnBuscar
            // 
            this.btnBuscar.Location = new System.Drawing.Point(199, 117);
            this.btnBuscar.Name = "btnBuscar";
            this.btnBuscar.Size = new System.Drawing.Size(75, 37);
            this.btnBuscar.TabIndex = 4;
            this.btnBuscar.Text = "Buscar";
            this.btnBuscar.UseVisualStyleBackColor = true;
            this.btnBuscar.Click += new System.EventHandler(this.btnBuscar_Click);
            // 
            // btnCambiar
            // 
            this.btnCambiar.Location = new System.Drawing.Point(661, 386);
            this.btnCambiar.Name = "btnCambiar";
            this.btnCambiar.Size = new System.Drawing.Size(75, 37);
            this.btnCambiar.TabIndex = 5;
            this.btnCambiar.Text = "Cambiar";
            this.btnCambiar.UseVisualStyleBackColor = true;
            this.btnCambiar.Click += new System.EventHandler(this.btnCambiar_Click);
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Location = new System.Drawing.Point(316, 12);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.RowTemplate.Height = 24;
            this.dataGridView1.Size = new System.Drawing.Size(698, 355);
            this.dataGridView1.TabIndex = 6;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(18, 124);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(20, 17);
            this.label1.TabIndex = 7;
            this.label1.Text = "CI";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(18, 172);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(58, 17);
            this.label2.TabIndex = 8;
            this.label2.Text = "Nombre";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(18, 217);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(58, 17);
            this.label3.TabIndex = 9;
            this.label3.Text = "Paterno";
            this.label3.Click += new System.EventHandler(this.label3_Click);
            // 
            // btnBorrar
            // 
            this.btnBorrar.Location = new System.Drawing.Point(805, 386);
            this.btnBorrar.Name = "btnBorrar";
            this.btnBorrar.Size = new System.Drawing.Size(75, 40);
            this.btnBorrar.TabIndex = 10;
            this.btnBorrar.Text = "Borrar";
            this.btnBorrar.UseVisualStyleBackColor = true;
            this.btnBorrar.Click += new System.EventHandler(this.btnBorrar_Click);
            // 
            // btnMostrarPersonas
            // 
            this.btnMostrarPersonas.Location = new System.Drawing.Point(79, 479);
            this.btnMostrarPersonas.Name = "btnMostrarPersonas";
            this.btnMostrarPersonas.Size = new System.Drawing.Size(129, 41);
            this.btnMostrarPersonas.TabIndex = 11;
            this.btnMostrarPersonas.Text = "Mostrar Personas";
            this.btnMostrarPersonas.UseVisualStyleBackColor = true;
            // 
            // btnMostrarCatastros
            // 
            this.btnMostrarCatastros.Location = new System.Drawing.Point(242, 479);
            this.btnMostrarCatastros.Name = "btnMostrarCatastros";
            this.btnMostrarCatastros.Size = new System.Drawing.Size(152, 41);
            this.btnMostrarCatastros.TabIndex = 12;
            this.btnMostrarCatastros.Text = "Mostrar Catastros";
            this.btnMostrarCatastros.UseVisualStyleBackColor = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1159, 532);
            this.Controls.Add(this.btnMostrarCatastros);
            this.Controls.Add(this.btnMostrarPersonas);
            this.Controls.Add(this.btnBorrar);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.btnCambiar);
            this.Controls.Add(this.btnBuscar);
            this.Controls.Add(this.btnAgregar);
            this.Controls.Add(this.textBoxPaterno);
            this.Controls.Add(this.textBoxNombre);
            this.Controls.Add(this.textBoxCI);
            this.Name = "Form1";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox textBoxCI;
        private System.Windows.Forms.TextBox textBoxNombre;
        private System.Windows.Forms.TextBox textBoxPaterno;
        private System.Windows.Forms.Button btnAgregar;
        private System.Windows.Forms.Button btnBuscar;
        private System.Windows.Forms.Button btnCambiar;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button btnBorrar;
        private System.Windows.Forms.Button btnMostrarPersonas;
        private System.Windows.Forms.Button btnMostrarCatastros;
    }
}

