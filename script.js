function loadMenu() {
  axios.get('api/get_menu.php').then(res => {
    const menuList = document.getElementById('menu-list');
    const itemSelect = document.getElementById('item-id');
    menuList.innerHTML = '';
    itemSelect.innerHTML = '<option value="">Select an item</option>';
    
    res.data.forEach(item => {
      menuList.innerHTML += `<li><strong>${item.name}</strong> - $${parseFloat(item.price).toFixed(2)}</li>`;
      itemSelect.innerHTML += `<option value="${item.id}">${item.name} - $${parseFloat(item.price).toFixed(2)}</option>`;
    });
  });
}

function placeOrder() {
  const name = document.getElementById('customer-name').value;
  const item_id = document.getElementById('item-id').value;
  const quantity = document.getElementById('quantity').value;

  if (!name || !item_id || !quantity) {
    document.getElementById('msg').textContent = 'Please complete all fields.';
    return;
  }

  axios.post('api/place_order.php', {
    customer_name: name,
    item_id: item_id,
    quantity: quantity
  }).then(res => {
    document.getElementById('msg').textContent = '✅ Order placed successfully!';
    document.getElementById('order-form').reset();
  }).catch(() => {
    document.getElementById('msg').textContent = '❌ Failed to place order.';
  });
}

// Load the menu items when the page loads
loadMenu();
