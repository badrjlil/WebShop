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