require("dotenv").config();
const HDWalletProvider = require("@truffle/hdwallet-provider");
const { INFURA_API_KEY, MNEMONIC } = process.env;

module.exports = {
  networks: {
    development: {
      host: "127.0.0.1",
      port: 8545,
      network_id: "*", // Match any network id
      gas: 5000000,
    },
    sepolia: {
      provider: () =>
        new HDWalletProvider(
          "other nut brand wide leave metal blur panther second tribe stuff educate",
          "https://sepolia.infura.io/v3/55f41ea4d8184827a408dc1206844586"
        ),
      network_id: "11155111",
      gas: 4465030,
    },
  },
  compilers: {
    solc: {
      version: "0.8.0",
      settings: {
        optimizer: {
          enabled: true, // Default: false
          runs: 200, // Default: 200
        },
      },
    },
  },
};
