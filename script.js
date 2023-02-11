/*alert('hi');
document.getElementById('filter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var minPrice = this.elements.min.value;
    var maxPrice = this.elements.max.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'filter.php?max=' + maxPrice + '&min=' + minPrice, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById('products').innerHTML = xhr.responseText;
      }
    };
    xhr.send();
    alert("done");
  });
*/

const rangeButton1 = document.getElementById('range-button-1');
const rangeButton2 = document.getElementById('range-button-2');
const rangeValue1 = document.getElementById('range-value-1');
const rangeValue2 = document.getElementById('range-value-2');
rangeButton1.addEventListener('input', function() {
    rangeValue1.value = rangeButton1.value;
});
rangeButton2.addEventListener('input', function() {
    rangeValue2.value = rangeButton2.value;
});
rangeValue1.addEventListener('input', function() {
    rangeButton1.value = rangeValue1.value;
});
rangeValue2.addEventListener('input', function() {
    rangeButton2.value = rangeValue2.value;
});



function DoSubmit(){
  document.querySelector("#myForm input[name='keyword']").value = document.querySelector("#search-box").value;
  console.log(document.querySelector("#myForm input[name='keyword']").value);
  return true;
  
}

