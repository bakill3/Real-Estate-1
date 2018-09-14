<?php
if(!isset($_SESSION['lang'])) {
	$_SESSION['lang'] = "pt";
} 
if(isset($_SESSION['lang'])) {
	$lingua = $_SESSION['lang'];
	if (isset($_POST['lingua_eng'])) {
		$_SESSION['lang'] = "en";
	} 
	if(isset($_POST['lingua_pt'])) {
		$_SESSION['lang'] = "pt";
	}
	if(isset($_POST['lingua_fr'])) {
		$_SESSION['lang'] = "fr";
	}
}

if ($_SESSION['lang'] == "en") {
	//CABEÇALHO-----------------------------------------------------------------------------------------------------------------------------------------------
	$menu_header = array("Email:", "Username:", "Role:", "Settings");

	$menu = array("home", "about", "properties", "news", "Contacts", "Register");
	$user_menu = array("Email:", "Username:", "Role:", "Settings");
	$register_menu = array("Name", "Surname", "Phone Number", "Email", "Password", "Repeat Password");
	$favorites_menu = array("You don't have favorites yet", "Property", "Date", "Remove");
	$slideshow_menu = array("Find Your Home", "Best Deals");
	$linguas_btn = array("Portuguese", "French");
	//--------------------------------------------------------------------------------------------------------------------------------------------------------

	//DEFINIÇÕES----------------------------------------------------------------------------------------------------------------------------------------------
	$manage_acc = array("Manage Account:", "First Name:", "Last Name:", "Gender:", "Phone:", "Email:", "Description about me:", "Agent Photo", "Update Data");
	$add_imoveis = array("Add Properties", "Title", "Description", "Price(€)", "Price($)", "Number of rooms", "Bathroom number", "House Area", "Total Area", "Plot Area", "Plot Area SQF", "Build Year", "Country", "District", "City", "Zone", "Latitude", "Longitude", "Property Type", "Business Description", "Feature", "Choose Multiple Photos", "Insert Property", "Edit Property", "Images", "Update Property");
	$edit_imoveis = array("Edit Properties", "Image", "Title", "Property Type", "Edit", "Delete");
	//--------------------------------------------------------------------------------------------------------------------------------------------
	// PROPRIEDADE
	$propriedade_lang = array("Property Type:", "Description", "Location", "Country", "District", "City", "Bedrooms", "Bathrooms", "Pool", "Full Area", "House Area", "Business Description", "Aditional Details", "PLOT AREA:", "PLOT AREA SQF:", "PROPERTY CONDITION:", "BUILT YEAR:", "INTERNAL ID:", "About The Agent:", "Short Description");
	//------------------------------

	//EDITAR USERS
	$users_edit = array("Edit Users", "Name", "Last Name", "Email", "Phone", "Role", "Make Agent", "Make Admin", "Delete", "Already Is");
	//----------------------------
	//CONTACTOS E SOBRE 
	$about = array("WebMax develops ONLINE businesses with the goal of giving a helping hand to quicken the growth of any enterprise. Initially we analyse the needs of your to-be clients with accuracy and professionalism for free, allowing the creation of appropriate options for your business needs with a modern and adaptive Web Design for any device.", "More", "Call us: +351 961234567 or click bellow", "Contacts");
	//-----------------
} elseif ($_SESSION['lang'] == "pt") {
	//CABEÇALHO-----------------------------------------------------------------------------------------------------------------------------------------------
	$menu_header = array("Email:", "Utilizador:", "Estatuto:", "Definições");

	$menu = array("início", "sobre nós", "propriedades", "notícias", "contactos", "Registar");
	$user_menu = array("Email:", "Username:", "Estatuto:", "Definições");
	$register_menu = array("Nome", "Apelido", "Número de Telefone", "Email", "Password", "Repetir Password");
	$favorites_menu = array("Ainda não tem favoritos", "Imóvel", "Data", "Remover");
	$slideshow_menu = array("Encontre a sua casa", "Melhores Negócios");
	$linguas_btn = array("Inglês", "Francês");
	//--------------------------------------------------------------------------------------------------------------------------------------------------------

	//DEFINIÇÕES----------------------------------------------------------------------------------------------------------------------------------------------
	$manage_acc = array("Gerir Conta:", "Nome:", "Sobrenome:", "Género:", "Telemóvel:", "Email:", "Descrição sobre mim:", "Foto de Agente", "Atualizar Dados");
	$add_imoveis = array("Adicionar Propriedades", "Titulo", "Descrição", "Preço(€)", "Preço($)", "Número de quartos", "Número de WC'S", "Área da Casa", "Área Total", "Plot Area", "Plot Area SQF", "Ano de construção", "País", "Distrto", "Cidade", "Zona", "Latitude", "Longitude", "Tipo de propriedade", "Descrição de negócio", "Feature", "Escolher múltiplas fotos", "Inserir Imóvel", "Editar Imóvel", "Imagens", "Atualizar Imóvel");
	$edit_imoveis = array("Editar Propriedades", "Imagem", "Titulo", "Tipo de propriedade", "Editar", "Eliminar");
	//---------------------------------------------------------------------------------------------------------------------------------------
	// PROPRIEDADE
	$propriedade_lang = array("Tipo de Propriedade:", "Descrição", "Localização", "País", "Distrito", "Cidade", "Quartos", "WC'S", "Piscina", "Área Total", "Área da Casa", "Descrição de Negócio", "Detalhes Adicionais", "PLOT AREA:", "PLOT AREA SQF:", "CONDIÇÃO DA PROPRIEDADE:", "ANO DE CONSTRUÇÃO:", "ID INTERNO:", "Sobre o agente:");
	//------------------------------
		//EDITAR USERS
	$users_edit = array("Editar Utilizadores", "Nome", "Sobrenome", "Email", "Telemóvel", "Estatuto", "Tornar Agente", "Tornar Administrador", "Eliminar", "Já é");
	//----------------------------
	//CONTACTOS E SOBRE 
	$about = array("A WebMax desenvolve soluções empresariais ONLINE com o intuito de agilizar e impulsionar qualquer tipo de negócio. Inicialmente, analisa as necessidades dos seus potenciais clientes com rigor e profissionalismo de forma gratuita, possibilitando assim a criação de soluções adequadas à realidade de cada negócio com um Web Design moderno e adaptável a qualquer dispositivo.", "Mais", "Para nos contactar ligue: +351 961234567 ou clique em baixo", "Contactos");
	//-----------------
} elseif($_SESSION['lang'] == "fr") {
	//CABEÇALHO-----------------------------------------------------------------------------------------------------------------------------------------------		
	$menu_header = array("Email:", "Nom d'utilisateur:", "Rôle:", "Paramètres");

	$menu = array("Accueil", "à propos", "propriétés", "actualités", "Contacts", "Enregistrer");
	$user_menu = array("Email:", "Nom d'utilisateur:", "Rôle:", "Paramètres");
	$register_menu = array("Nom", "Nom de famille", "Numéro de téléphone", "Email", "Mot de passe", "Répéter mot de passe");
	$favorites_menu = array("Vous n'avez pas encore de favoris", "Propriété", "Date", "Supprimer");
	$slideshow_menu = array("Trouvez votre maison", "Meilleures offres");
	$linguas_btn = array("Portugais", "Anglais");
	//--------------------------------------------------------------------------------------------------------------------------------------------------------
	//DEFINIÇÕES----------------------------------------------------------------------------------------------------------------------------------------------
	$manage_acc = array("Gérer Compte:", "Prénom:", "Nom:", "Sexe:", "Téléphone:", "Email:", "Description de moi:", "Photo de l'agent", "Mettre à jour les données" );

	$add_imoveis = array("Ajouter Propriétés", "Titre", "Description", "Prix (€)", "Prix ($)", "Nombre de pièces", "Numéro de salle de bain", "Surface habitable", "Surface totale", " Zone de tracé "," Zone de tracé SQF "," Année de construction "," Pays "," District "," Ville "," Zone "," Latitude "," Longitude "," Type de propriété "," Description de l'entreprise "," Feature "," Choisir plusieurs photos "," Insérer une propriété "," Modifier la propriété "," Images "," Mettre à jour la propriété ");

	$edit_imoveis = array("Modifier les propriétés", "Image", "Titre", "Type de propriété", "Modifier", "Supprimer");
	//--------------------------------------------------------------------------------------------------------------------------------------------
	// PROPRIEDADE
	$propriedade_lang = array("Type de propriété:", "Description", "Emplacement", "Pays", "District", "Ville", "Chambres", "Salles de bains", "Piscine", "Surface complète", "Surface de la maison", " Description de l'entreprise "," Détails supplémentaires "," ZONE PLOT: "," ZONE PLOT SQF: "," CONDITIONS DE PROPRIÉTÉ: "," Année de construction: "," ID INTERNE: "," À propos de l'agent: ", "Bréve Description");
	//------------------------------
	$users_edit = array ("Modifier les utilisateurs", "Prenom", "Nom", "Email", "Téléphone", "Rôle", "Faire Agente", "Créer un administrateur", "Supprimer", "Est déjà");
	$about = array("WebMax développe des activités en ligne dans le but de donner un coup de main pour accélérer la croissance de toute entreprise.A l'origine, nous analysons les besoins de vos futurs clients avec précision et professionnalisme gratuitement, permettant la création d'options appropriées pour vos besoins d'affaires avec un Web Design moderne et adaptatif pour tout appareil.", "Plus", "Appelez nous: +351 961234567 ou cliquez ci-dessous", "Contacts");
	}
?>