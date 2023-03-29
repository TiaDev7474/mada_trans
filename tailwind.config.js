/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/**/*.{html,js,php}",
             "./components/*.php"
           
          ],
  theme: {
   
    extend: { 
      colors:{
      mainbgColor:'#090909',
      btnprimary:'#FF004B',
      btnsecondary:'#1470E5',
      main_text_color:'#f2f2f2'
      
   },
  },
  },
  plugins: [],
}
