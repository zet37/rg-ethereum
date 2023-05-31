<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="https://cdn.jsdelivr.net/npm/web3@1.5.2/dist/web3.min.js"></script>
</head>
<body>
  <form id="ijazahForm">
    <h2>ISI DATA</h2>
    
    <label>Name</label>
    <input type="text" name="name" placeholder="Name"><br>

    <label>University</label>
    <input type="text" name="univ" placeholder="University"><br>

    <label>Gpa</label>
    <input type="text" name="gpa" placeholder="Gpa"><br>

    <button type="submit">Submit</button>
  </form>
  <div class="cont1">
    <a class="cont1">Print</a>
    <a class="cont1" href="logout.php">Logout</a>  
  </div> 

  <script>
    // Initialize web3
    window.addEventListener('load', async () => {
      if (typeof window.ethereum !== 'undefined') {
        // MetaMask is available
        const web3 = new Web3(window.ethereum);
        try {
          // Request access to user's MetaMask accounts
          await window.ethereum.enable();

          // Contract address and ABI
          const contractAddress = '0xE0962A267B63d325B8b54FEA580FB009255D60F1';
          const contractABI = [
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                  },
                ],
                name: "ijazahs",
                outputs: [
                  {
                    internalType: "uint256",
                    name: "id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "universitas",
                    type: "string",
                  },
                  {
                    internalType: "bytes32",
                    name: "uniqueHash",
                    type: "bytes32",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [],
                name: "nextIjazahId",
                outputs: [
                  {
                    internalType: "uint256",
                    name: "",
                    type: "uint256",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_universitas",
                    type: "string",
                  },
                ],
                name: "createIjazah",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [],
                name: "getAllIjazahs",
                outputs: [
                  {
                    components: [
                      {
                        internalType: "uint256",
                        name: "id",
                        type: "uint256",
                      },
                      {
                        internalType: "string",
                        name: "nama",
                        type: "string",
                      },
                      {
                        internalType: "string",
                        name: "ipk",
                        type: "string",
                      },
                      {
                        internalType: "string",
                        name: "universitas",
                        type: "string",
                      },
                      {
                        internalType: "bytes32",
                        name: "uniqueHash",
                        type: "bytes32",
                      },
                    ],
                    internalType: "struct StorageIjazah.IjazahData[]",
                    name: "",
                    type: "tuple[]",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "getIjazahByIdAnduniqueHash",
                outputs: [
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "",
                    type: "string",
                  },
                ],
                stateMutability: "view",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "updateuniqueHash",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                ],
                name: "updateNama",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                  {
                    internalType: "string",
                    name: "_nama",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_ipk",
                    type: "string",
                  },
                  {
                    internalType: "string",
                    name: "_universitas",
                    type: "string",
                  },
                  {
                    internalType: "bytes32",
                    name: "_uniqueHash",
                    type: "bytes32",
                  },
                ],
                name: "updateData",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
              {
                inputs: [
                  {
                    internalType: "uint256",
                    name: "_id",
                    type: "uint256",
                  },
                ],
                name: "deleteIjazah",
                outputs: [],
                stateMutability: "nonpayable",
                type: "function",
              },
            ];

          // Contract instance
          const contract = new web3.eth.Contract(contractABI, contractAddress);

          // Form submission event handler
          document.getElementById('ijazahForm').addEventListener('submit', async (event) => {
            event.preventDefault();

            // Get form inputs
            const name = event.target.elements.name.value;
            const university = event.target.elements.univ.value;
            const gpa = event.target.elements.gpa.value;

            try {
              // Send a transaction to the contract function createIjazah
              const accounts = await web3.eth.getAccounts();
              const tx = await contract.methods.createIjazah(name, gpa, university).send({ from: accounts[0] });

              // Transaction receipt
              console.log(tx);

              // Reset form inputs
              event.target.reset();

            } catch (error) {
              console.error(error);
            }
          });

        } catch (error) {
          console.error(error);
        }
      } else {
        // MetaMask is not available, show an error message or prompt the user to install it
        console.error('Please install MetaMask to use this DApp.');
      }
    });
  </script>
</body>
</html>

<?php
} else {
  header("Location: index.php?");
  exit();
}
?>
