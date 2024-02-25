/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./node_modules/flowbite/**/*.js",
  ],
  theme: {
      extend: {
          fontFamily: {
              sans: ["Plus Jakarta Sans", "sans-serif"],
          },
          colors: {
              primary: "#1F448B",
              transparent: "#FDFFFC",
              // ds: {
              //     cyan: {
              //         100: "#97D7D9",
              //         200: "#009FBD",
              //     },
              //     blue: "#104A7A",
              //     blue10: "#406E95",
              //     red: "#F46B69",
              //     black: "#1D1D1D",
              //     gray: "#595552",
              //     white10: "#FAFAFA",
              //     white: "#FFFFFF",
              // },
              // primary: "#104A7A",
              // "primary-10": "#CFDBE4",
              // "primary-20": "#9FB7CA",
              // dark: "#181717",
              // surface: "#FAFAFA",
              // secondary: "#F2CA13",
              // "secondary-10": "#FCF4D0",
          },
      },
  },
};
