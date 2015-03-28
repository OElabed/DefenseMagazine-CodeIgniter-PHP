
    /*==================================================================================|
    |	ConForm : CONtrole des champs d'un FORMulaire      								|
    |	Janvier 2005	© marcel.Bultez@Tiscali.fr						   				|
	|===================================================================================|
	|	Controle="nom:nom de la zone;			| n° champ par défaut 					|
	|			  erreur:libellé de l'erreur;	| invalide par défaut					|
	|             type:obligatoire;				| doit être renseigné					|
	|				   date;					| dépend de "format:"					|
	|				   cocher;					| cases à cocher (checkbox)				|
	|				   liste;					| select où choisir des lignes			|
	|				   radio;					| radio à cocher ( au moins 1 )			|
	|				   mail;					| adresse Mail ( ab.cd@ef.gh )			|
	|				   nombre;					| valeur								|
	|				   specifique;				| test fait dans format					|
	|             format:de la date;			| si type:date  jjmmaaaa 				|
	|											|               jj/mm/aaaa ( défaut ) 	|
	|					 test particulier;		| if ( test particulier )				|	   
	|			  separateur:?;					| entre jj,mm et aaaa					|
	|											| n'importe par défaut  				|
	|			  mini:valeur;					| valeur mini de nombre ou				|
	|											| nombre de cases mini à cocher			|
	|											|  si select multiple, défaut=1			|
	|			  maxi:valeur;					| valeur maxi de nombre ou				|
	|											| nbr cases maxi à cocher si 			|
	|											|   select multiple, défaut=mini		|
	|			  bonfond:couleur;				| couleurs fond et						|
	|			  bontexte:couleur;				|     texte si contrôles bons			|  
	|			  erreurfond:couleur;			| couleurs fond et						|
	|			  erreurtexte:couleur;			|     texte si contrôles faux			|  
	|===================================================================================|
	| 			Si vous ajoutez/modifier des contrôles, ce serait    					|
	|			sympa	de me les faire parvenir  : merci d'avance 						|
	|			Si vous voulez que j'en ajoute, contactez-moi							|
	|						marcel.Bultez@Tiscali.fr									|
	|==================================================================================*/

//######################################################################
function RLtrim(zone)	//## supprimer les espaces en début et en fin ##
//######################################################################
{	return zone.replace(/(^\s*)|(\s*$)/g,"");	}

//##############################################################
function SignalErreur(z1,frm,z2)	//## signaler les erreurs ##
//##############################################################
{	if ( z1["erreurfond"] )
		{ frm.elements[z2].style.backgroundColor=z1["erreurfond"] ; }
	if ( z1["bontexte"] )
		{ frm.elements[z2].style.color=z1["erreurtexte"] ; }
	return "\r\n"+z1["erreur"];	}

//#######################################################################
function ConForm(formulaire)	//## contrôle des champs du formulaire ##
//#######################################################################
{	var retour="",tester;
	for (	no_element=0;
			no_element<formulaire.elements.length;
			no_element++)	// pour toutes les champs d'un formulaire
	{	tester=formulaire.elements[no_element].alt;
		if (tester)	// il y a un contôle="données" ?
		{	var zones=RLtrim(tester).split(";");
			// format : controle="id1:valeur1;id2:valeur2...."
			var	valeur=new Array();
			for (	var z=0;
					z<zones.length;
					z++ )	// pour toutes les zones du controle
				{	trv=RLtrim(zones[z]).split(":");	// id#:valeur#
					if (trv.length==2)  
					    valeur[RLtrim(trv[0].toLowerCase())]=RLtrim(trv[1].toLowerCase());	}	// valeur["id#"]=valeur#
			if ( !valeur["nom"] )
				valeur["nom"]="Champ("+(no_element+1)+")";	// valeurs par défaut
			if ( !valeur["erreur"] )
				valeur["erreur"]=valeur["nom"]+" invalide";	// valeurs par défaut
			if ( valeur["bonfond"] )
				{ formulaire.elements[no_element].style.backgroundColor=valeur["bonfond"] ; }
			if ( valeur["bontexte"] )
				{ formulaire.elements[no_element].style.color=valeur["bontexte"] ; }
			switch ( valeur["type"] )	{	// traitements possibles actuellement

				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  
				case "specifique":	//~~ test dans format: ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  
					try			{	if ( eval(valeur["format"]) )	
									{ 	retour+=SignalErreur(valeur,formulaire,no_element);	}	}	
					catch(e)	{ }
					break;
					
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "radio":	//~~ Radio ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					var nom=formulaire.elements[no_element].name;
					var err=true;
					for ( var n=0;n<formulaire[nom].length;n++ )
						{ if ( formulaire[nom][n].checked ) 
							{	err=false;
							    n=nom.length;	}	}
					if ( err )
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);	}	
					break;
					
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	 			case "liste":	//~~ select ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					switch ( formulaire.elements[no_element].multiple ) {
						case true:
							if ( !valeur["mini"] ) valeur["mini"]=1;
							if ( !valeur["maxi"] ) valeur["maxi"]=valeur["mini"];
							break;
						case false:
							valeur["mini"]=1;
							valeur["maxi"]=valeur["mini"];
							break;	}
					var nbr=0;
					var nom=formulaire.elements[no_element];
					for ( var n=0;n<nom.length;n++)
						{ if ( nom[n].selected )
							{ nbr++; } }
					if ( nbr < valeur["mini"] || nbr > valeur["maxi"] )
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);   }					 
					break;
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "date":	//~~ date ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					var j,m,a,la,s;
					switch ( valeur["format"] ) {
						case "jjmmaaaa":
							la=4;
							j=0;
							m=2;
							a=4;
							s=new Array();
							break;
						default:	
							//~~ jj/mm/aaaa par défaut
						case "jj/mm/aaaa":
							la=4;
							j=0;
							m=3;
							a=6;
							s=new Array(2,5);
							break;	}
					if ( formulaire.elements[no_element].value.length  != (la+s.length+4) )
						{	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}
					if ( valeur["separateur"] )
					{	for ( var n=0; n<s.length; n++ )
							{	if (formulaire.elements[no_element].value.charAt(s[n])!=valeur["separateur"] )
								{	retour+=SignalErreur(valeur,formulaire,no_element);
									break;	}	}	}
					j=Number(formulaire.elements[no_element].value.substring(j,2));
					m=Number(formulaire.elements[no_element].value.substring(m,m+2));
					a=Number(formulaire.elements[no_element].value.substring(a,a+la));
					if ( j<1 || j>fm || m<1 || m>12 || isNaN(j) || isNaN(m) || isNaN(a) )
						{	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}
					var fm;
					switch (m)	{
						case 4:
						case 6:
						case 9:
						case 11:
							fm=30;
							break;
						case 2:
							if ( (a%4)==0 && ((a%100)!=0 || (a%400)==0) )
								 fm=29;
							else fm=28;
							break;
						default:
							fm=31;
							break;	}
					if ( j>fm )
						{	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}
					break;

				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "cocher":	//~~ checkbox ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					var nom=formulaire.elements[no_element].name;
					var nbc=0;
					for ( var n=0;n<formulaire[nom].length;n++ )
						{ if ( formulaire[nom][n].checked ) nbc++;	}
					if ( nbc<valeur["mini"] || nbc>valeur["maxi"] )
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}	
					break;

				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "mail":	//~~ mail ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				if (!(formulaire.elements[no_element].value.match("[-\./w]*@[/w]*\.[/w]*") )  && (formulaire.elements[no_element].value.length>0))
					   
						retour+=SignalErreur(valeur,formulaire,no_element);
					break;
									
				case "alpha":
					
					if ( !formulaire.element[no_element].value.match ("/^[A-Za-z0-9]+$/"))
					retour+=SignalErreur(valeur,formulaire,no_element);
					break;
	
				
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "nombre":	//~~ nombre ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					if (isNaN(formulaire.elements[no_element].value))
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}
					if (valeur["mini"])
					{	if (Number(formulaire.elements[no_element].value)<Number(valeur["mini"]))
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}	}
					if (valeur["maxi"])
					{	if (Number(formulaire.elements[no_element].value)>Number(valeur["maxi"]))
						{ 	retour+=SignalErreur(valeur,formulaire,no_element);
							break;	}	}
					break;

				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				case "obligatoire":	//~~ obligatoire ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					if (formulaire.elements[no_element].value.length<1) 
						retour+=SignalErreur(valeur,formulaire,no_element);
					break;

				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				default:	//~~ pas de contrôle alors ? ~~~~~~~~~~~~~~~~~~~~
				//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					break;	}	}	}

	if (retour.length>0)
			{	alert ( retour );
				return false;	}
	else	{	return true;	}	}

