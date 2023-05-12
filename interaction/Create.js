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
const accountAddress = "0xA2A31000Ed7e6139C22070c325849AFCd6dB8739";
const privateKey =
  "0x8241f750192cd672ce5b0e2e475edb4b055b7d494b53f56428225c4456e0ba5e";

const web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:9545"));
const contract = new web3.eth.Contract(abi, contractAddress);

// call the createIjazah function with the required parameters
const nama = "Rayyan";
const ipk = "3.9";
const universitas = "Telkom University";
const functionData = contract.methods
  .createIjazah(nama, ipk, universitas)
  .encodeABI();

const transactionObject = {
  from: accountAddress,
  to: contractAddress,
  gas: 200000,
  gasPrice: web3.utils.toWei("10", "gwei"),
  data: functionData,
};

async function signTransaction() {
  var signedTransaction = await web3.eth.accounts.signTransaction(
    transactionObject,
    privateKey
  );
}
signTransaction();

async function sendSignedTransaction() {
  var transactionReceipt = await web3.eth.sendSignedTransaction(
    signTransaction.rawTransaction
  );
}
sendSignedTransaction();

async function trxReceipt() {
  const transactionReceipt = await transactionReceipt();
  console.log("Transaction receipt:", transactionReceipt);
}
