firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.

    var user = firebase.auth().currentUser;

    if(user != null){


    }

  } else {
    // No user is signed in.
      window.alert("To view this info you will need to login");
      window.open("https://elimisha-watoto.web.app/","_top");





  }
});
function logout(){
  firebase.auth().signOut();
  window.alert("You have been logged out");
  window.open("https://www.elimishawatoto.org",'_top');


}
