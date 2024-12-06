from web3 import Web3

# Conexión al nodo (reemplaza con tu URL de nodo)
w3 = Web3(Web3.HTTPProvider("http://127.0.0.1:7545"))  # Ejemplo para Ganache

# Hash de la transacción
tx_hash = "0xe3083b36acb352c422d701de7a376de6fb9c038eb1bdde6f7a99315c90c13821"

# Obtener los detalles de la transacción
tx_details = w3.eth.get_transaction(tx_hash)
print(tx_details)