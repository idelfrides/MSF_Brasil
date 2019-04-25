
// função em javascript q limpa todos os campos do formulário

function limpa_campo2(){
	//document.getElementById('form-group').reset(); // procura o elemento pelo id
	document.getElementsByTagName('form').reset(); // procura o elemento pelo nome da tag
	alert('limpa campo 2 foi executado!');
}