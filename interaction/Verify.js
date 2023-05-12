const Web3 = require("web3");
const abi = [
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
        name: "txHash",
        type: "bytes32",
      },
    ],
    stateMutability: "view",
    type: "function",
    constant: true,
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
    constant: true,
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
            name: "txHash",
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
    constant: true,
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
        name: "_txHash",
        type: "bytes32",
      },
    ],
    name: "getIjazahByIdAndTxHash",
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
    constant: true,
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
        name: "_txHash",
        type: "bytes32",
      },
    ],
    name: "updateTxHash",
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
        name: "_txHash",
        type: "bytes32",
      },
    ],
    name: "updateData",
    outputs: [],
    stateMutability: "nonpayable",
    type: "function",
  },
];
const contractAddress = "0x4674184eeb73cCBcD046f8C77D04356FA978B92f";

const web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:9545"));
const contract = new web3.eth.Contract(abi, contractAddress);

// Call a view function to read data from the contract
async function readData() {
  const id = 0; // The ID of the Ijazah to read
  const txHash =
    "0x0112856b4b5200aa7c6f6bb9bbe794d8749e82f30e2b6c09360f4c9dbecc4f05"; // The transaction hash of the Ijazah to read
  const result = await contract.methods
    .getIjazahByIdAndTxHash(id, txHash)
    .call();
  console.log("Nama:", result[0]);
  console.log("IPK:", result[1]);
  console.log("Universitas:", result[2]);
}

readData();
