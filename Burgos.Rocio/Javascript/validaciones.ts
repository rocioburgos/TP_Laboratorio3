
        function AdministrarValidaciones(){
         
            let DNI:number = parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);
            let legajo:number = parseInt((<HTMLInputElement>document.getElementById("txtLegajo")).value);
            let sueldo:number = parseInt((<HTMLInputElement>document.getElementById("txtSueldo")).value);
            let turno: string = ObtenerTurnoSeleccionado();
            var retorno:boolean=true;
            if(!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(DNI,1000000,55000000)){
               AdministrarSpanErrores("txtDni",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("txtDni",false);
            }

            if(!ValidarCamposVacios("txtApellido")){
                AdministrarSpanErrores("txtApellido",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("txtApellido",false);
            }

            if(!ValidarCamposVacios("txtNombre")){
                AdministrarSpanErrores("txtNombre",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("txtNombre",false);
            }


            if(!ValidarCombo("cboSelect","---")){
                AdministrarSpanErrores("cboSelect",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("cboSelect",false);
            }

            if(!ValidarCamposVacios("txtLegajo") || !ValidarRangoNumerico(legajo,100,550)){
                AdministrarSpanErrores("txtLegajo",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("txtLegajo",false);
            }


            if(!ValidarCamposVacios("txtSueldo") || !ValidarRangoNumerico(sueldo,8000,25000) || sueldo> ObtenerSueldoMaximo(turno)){
                AdministrarSpanErrores("txtSueldo",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("txtSueldo",false);
            }

            if(!ValidarCamposVacios("foto")){
                AdministrarSpanErrores("foto",true);
                retorno=false;
            }else{
                AdministrarSpanErrores("foto",false);
            }
            return retorno;
        }

     
        function ValidarCamposVacios(idCampo:string):boolean{
            let campo:any=(<HTMLInputElement>document.getElementById(idCampo));
            if(campo.value == null|| campo.value.length == 0 ){
    
                return false;
            }
            return true;
        }

        function ValidarRangoNumerico(campo:number, minimo:number, maximo:number):boolean{
            let retorno= false;

            if(campo>=minimo && campo <=maximo){
                retorno=true;
            }

            return retorno;
        }

        function ValidarCombo(idCampo:string, noPermitido:string):boolean{
            let retorno= true;
            let campo:any=(<HTMLOptionElement>document.getElementById(idCampo)).value;
            if(campo===noPermitido){
                retorno=false;
            }

            return retorno;
        }
        
        function ObtenerTurnoSeleccionado():string{
            let retono:string="";
            var turno:any= (document.getElementsByName("rdoTurno"));
            //me devulve un array, con losvalores del grupo de radio buttons
            for(let i=0;i<turno.length;i++)
            {    if(turno[i].checked){
                    retono= turno[i].value;
                }
            }
            return  retono;
        }

        function ObtenerSueldoMaximo(turnoElegido:string):number{
            let retorno:number;
           
            if(turnoElegido==="Mañana"){
                retorno=20000;
            }else if(turnoElegido==="Tarde"){
                retorno=18500;
            }else {
                retorno= 25000;
            }
            return retorno;


        }

      /********************************************************************************************/
      
      function AdministrarValidacionesLogin() {

        
            let DNI:number = parseInt((<HTMLInputElement>document.getElementById("txtDni")).value);
            if(!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(DNI,1000000,55000000)){        
                AdministrarSpanErrores("txtDni",true);
            }else{
                AdministrarSpanErrores("txtDni",false);
            }

            if(!ValidarCamposVacios("txtApellido")){
                AdministrarSpanErrores("txtApellido",true);
            }else{
                AdministrarSpanErrores("txtApellido",false);
            }

        
            return VerificarValidacionesLogin();

    }

    function VerificarValidacionesLogin():boolean {
        let boolRetorno = true;
        let todoSpan: NodeList = document.querySelectorAll("span");

        for(let i=0;i<todoSpan.length;i++)
        {
            if((<HTMLSpanElement>todoSpan[i]).style.display=="block")
            {
                boolRetorno=false;
                break;
            }
        }

        return boolRetorno;
    }
  function AdministrarSpanErrores(id:string , mostrar:boolean){

        if(mostrar){
           
            (<HTMLSpanElement>(<HTMLSpanElement>document.getElementById(id)).nextElementSibling).style.display="block";
           
        }else{
            (<HTMLSpanElement>(<HTMLSpanElement>document.getElementById(id)).nextElementSibling).style.display="none";
        }
    }

    /************************************************************************************/
    

function AdministrarModificar(dniEmpleado: string) {
    
    (<HTMLInputElement>document.getElementById("hidModificar")).value = dniEmpleado;
   
     (<HTMLFormElement>document.getElementById("frmModificar")).submit();
     
 }
 
 function ModificarEmpleado(dni: string, apellido: string, nombre: string, sexo: string, legajo: string, sueldo: string, turno: string, foto: string): void
 {
 
     let turnoSeleccionado = turno;
     let sexoSeleccionado=0;
     
     switch (sexo) {
         case "M":
             sexoSeleccionado = 2;
             break;
         case "F":
             sexoSeleccionado = 1;
             break;
     }

     switch (turno) {
         case "Mañana":
             turnoSeleccionado = "rdoTurnoMañana";
             break;
         case "Tarde":
             turnoSeleccionado = "rdoTurnoTarde";
 
             break;
         case "Noche":
             turnoSeleccionado = "rdoTurnoNoche";
             break;
     }
    
     document.title = "HTML5 Formulario Modificar Empleado";
     (<HTMLElement>document.getElementById("tituloForm")).innerHTML = "Modificar Empleado";
     (<HTMLInputElement>document.getElementById("btnEnviar")).value = "Modificar";
 
     (<HTMLInputElement>document.getElementById("txtDni")).value = dni;
     (<HTMLInputElement>document.getElementById("txtDni")).readOnly = true;
     (<HTMLInputElement>document.getElementById("txtApellido")).value = apellido;
     (<HTMLInputElement>document.getElementById("txtNombre")).value = nombre;
     (<HTMLSelectElement>document.getElementById("cboSelect")).selectedIndex = sexoSeleccionado;
     (<HTMLInputElement>document.getElementById("txtLegajo")).value = legajo;
     (<HTMLInputElement>document.getElementById("txtLegajo")).readOnly = true;
     (<HTMLInputElement>document.getElementById("txtSueldo")).value = sueldo;
     (<HTMLInputElement>document.getElementById("hdnModificar")).value = dni;
     (<HTMLInputElement>document.getElementById(turnoSeleccionado)).checked = true;
     (<HTMLInputElement>document.getElementById("foto")).value=foto;
     
 }


