<!DOCTYPE html>
<html>
<head>
  <title>VERIFIKASI</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="https://cdn.jsdelivr.net/npm/web3@1.5.2/dist/web3.min.js"></script>
</head>
<body>
  <form id="verifikasiForm">
    <h2>VERIFIKASI</h2>
    <label for="id">ID:</label>
    <input type="text" name="id" placeholder="ID"><br>
    <label for="uniqueHash">Unique Hash:</label>
    <input type="text" name="uniqueHash" placeholder="Unique Hash">
    <br>
    <button type="submit">Submit</button>
    <div class="cont2">
      <a class="cont2" href="home.php">Back</a>
    </div>
  </form>

  <a href="logout.php">Logout</a>

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
          document.getElementById('verifikasiForm').addEventListener('submit', async (event) => {
            event.preventDefault();

            // Get form inputs
            const id = event.target.elements.id.value;
            const uniqueHash = event.target.elements.uniqueHash.value;

			try {
              // Call the contract function getIjazahByIdAnduniqueHash
              const result = await contract.methods.getIjazahByIdAnduniqueHash(id, uniqueHash).call();
              console.log(result);

              const nama = result[0];
              const universitas = result[1];
              const ipk = result[2];

              // Display the result in an alert
              alert(`Nama: ${nama}\nUniversitas: ${universitas}\nIPK: ${ipk}`);

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
