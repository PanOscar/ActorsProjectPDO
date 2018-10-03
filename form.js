/**
 * @author Oskar Bergmann
 * @copyright NIE usuwaj tego komentarza! (Do NOT remove this comment!)
 */


function zzz(){
	mail=document.getElementById("mail").value;
	imie=document.getElementById("imie").value;
	nazwisko=document.getElementById("nazwisko").value;
	tresc=document.getElementById("tresc").value;
	pytanie=document.getElementById("pyt").value;
	temat_Reg=/[a-z]{3,}/i;
	imie_Reg=/[a-z]{3,}/i;
	nazwisko_Reg=/[a-z]{3,}/i;
	mail_Reg=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	tresc_Reg=/^(\w[\w*\s\.]{10,})\w$/i;
	if(mail_Reg.test(mail)){
		document.getElementById("pmail").innerHTML="";
		document.getElementById("mail").style.border='1px solid #DDDDDD';
	} else{
		document.getElementById("pmail").innerHTML="Podaj prawidłowy e-mail";
		document.getElementById("pmail").style.color='red';
		document.getElementById("mail").style.border='2px solid red';
	}
	if(imie_Reg.test(imie)){
		document.getElementById("pimie").innerHTML="";
		document.getElementById("imie").style.border='1px solid #DDDDDD';
	} else{
		document.getElementById("pimie").innerHTML="*";
		document.getElementById("imie").style.border='2px solid red';
	}
	if(nazwisko_Reg.test(nazwisko)){
		document.getElementById("pnazwisko").innerHTML="";
		document.getElementById("nazwisko").style.border='1px solid #DDDDDD';
	} else{
		document.getElementById("pnazwisko").innerHTML="*";
		document.getElementById("nazwisko").style.border='2px solid red';
	}
	if(tresc_Reg.test(tresc)){
		document.getElementById("ptresc").innerHTML="";
		document.getElementById("tresc").style.border='1px solid #DDDDDD';
	} else{
		document.getElementById("ptresc").innerHTML="Minimum 10 znaków *";
		document.getElementById("tresc").style.border='2px solid red';
				
	}
	if(document.getElementById("selectid").value == "Inne"){
		if(temat_Reg.test(pytanie)){
			document.getElementById("Q").innerHTML="";
			document.getElementById("pyt").style.border='1px solid #DDDDDD';
		} else{
			document.getElementById("Q").innerHTML="*";
			document.getElementById("pyt").style.border='2px solid red';
		}
	} else if(document.getElementById("selectid").value == ""){
		document.getElementById("Q").innerHTML="*";
		document.getElementById("selectid").style.border='2px solid red';
	} else{
		document.getElementById("Q").innerHTML="";
	}
}
function inne(period){
	if(period == "Inne"){
		document.getElementById("pyt").style.display="block";
		document.getElementById("Q").innerHTML="";
		document.getElementById("pyt").style.border='1px solid #DDDDDD';
		document.getElementById("selectid").style.border='1px solid #DDDDDD';
	} else if(period == ""){
		document.getElementById("pyt").style.display="none";
		document.getElementById("pyt").value = "";
		document.getElementById("Q").innerHTML="*";
		document.getElementById("pyt").style.border='1px solid #DDDDDD';
		
		document.getElementById("selectid").style.border='2px solid red';
	} else{
		document.getElementById("pyt").style.display="none";
		document.getElementById("pyt").value = "";
		document.getElementById("Q").innerHTML="";
		document.getElementById("selectid").style.border='1px solid #DDDDDD';
	}
}