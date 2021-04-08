var form = document.getElementById('addForm');
form.addEventListener('submit',addItem);
var itemList = document.getElementById('items');
itemList.addEventListener('click', removeItem);

function addItem(e){
    e.preventDefault();
   var task = document.getElementById('item').value;  
   if(task != ''){
         var li = document.createElement('li');
            li.appendChild(document.createTextNode(task));
            li.className ="list-group-item";

            var deleteBtn = document.createElement('button');
            deleteBtn.className = "btn btn-danger btn-sm float-right delete";
            deleteBtn.appendChild(document.createTextNode("X"));
            console.log(deleteBtn);
            li.appendChild(deleteBtn);
            
            var listItems = document.getElementsByTagName('ul')[0];
            listItems.appendChild(li);

            document.getElementById('item').value = "";  
   }
   else
    alert('Please fill the input field');
  
}

function removeItem(e){
    if(e.target.classList.contains('delete')){
      if(confirm('Are You Sure?')){
        var li = e.target.parentElement;
        itemList.removeChild(li);
      }
    }
  }

