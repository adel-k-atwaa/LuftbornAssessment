
import Moment from "moment";

export default async function ({ $axios, store, redirect }) {
  // If the user is not authenticated

  let id = sessionStorage.getItem('id');
  let expires = sessionStorage.getItem('expires') == undefined? undefined:new Date(sessionStorage.getItem('expires'));
  const formData = new URLSearchParams()
  formData.append("username",process.env.username)
  formData.append("password",process.env.password)
  formData.append("client_id",process.env.client_id)
  formData.append("client_secret",process.env.client_secret)
  formData.append("grant_type",process.env.grant_type)
  if(id == undefined && expires == undefined){
    let res= await $axios.post(`http://${process.env.keycloakBaseURL}/auth/realms/jhipster/protocol/openid-connect/token`,formData)
    var t = new Date();
    t.setSeconds(t.getSeconds() +  res.data.expires_in);
    await sessionStorage.setItem('expires', t)
    await sessionStorage.setItem('access_token', res.data.access_token)
    await sessionStorage.setItem('expires_in', res.data.expires_in)
    await sessionStorage.setItem('token_type', res.data.token_type)
    await sessionStorage.setItem('refresh_token', res.data.refresh_token)
  }else if(id == undefined && expires != undefined){
    let moment = new Moment()
    if( moment.isBefore(expires)){
      //refresh token
      const formData = new URLSearchParams()
        formData.append("username",process.env.username)
        formData.append("password",process.env.password)
        formData.append("client_id",process.env.client_id)
        formData.append("client_secret",process.env.client_secret)
        // formData.append("refresh_token",sessionStorage.getItem('refresh_token'))
        formData.append("grant_type",process.env.grant_type)
        // console.log(formData)
        let res=await $axios.post(`http://${process.env.keycloakBaseURL}/auth/realms/jhipster/protocol/openid-connect/token`,formData)
        var t = new Date();
        t.setSeconds(t.getSeconds() +  res.data.expires_in);
        await sessionStorage.setItem('expires', t)
        await sessionStorage.setItem('access_token', res.data.access_token)
        await sessionStorage.setItem('expires_in', res.data.expires_in)
        await sessionStorage.setItem('token_type', res.data.token_type)
        await sessionStorage.setItem('refresh_token', res.data.refresh_token)

    }else{
      sessionStorage.clear()
      // console.log('nooooot valid token')
      let res= await $axios.post(`http://${process.env.keycloakBaseURL}/auth/realms/jhipster/protocol/openid-connect/token`,formData)
      var t = new Date();
      t.setSeconds(t.getSeconds() +  res.data.expires_in);
      await sessionStorage.setItem('expires', t)
      await sessionStorage.setItem('access_token', res.data.access_token)
      await sessionStorage.setItem('expires_in', res.data.expires_in)
      await sessionStorage.setItem('token_type', res.data.token_type)
      await sessionStorage.setItem('refresh_token', res.data.refresh_token)
    }
  }else{
    //refresh token
    const formData = new URLSearchParams()
        formData.append("username",process.env.username)
        formData.append("password",process.env.password)
        formData.append("client_id",process.env.client_id)
        formData.append("client_secret",process.env.client_secret)
        // formData.append("refresh_token",sessionStorage.getItem('refresh_token'))
        formData.append("grant_type",process.env.grant_type)
        // console.log(formData)
        let res=await $axios.post(`http://${process.env.keycloakBaseURL}/auth/realms/jhipster/protocol/openid-connect/token`,formData)
        var t = new Date();
        t.setSeconds(t.getSeconds() +  res.data.expires_in);
        await sessionStorage.setItem('expires', t)
        await sessionStorage.setItem('access_token', res.data.access_token)
        await sessionStorage.setItem('expires_in', res.data.expires_in)
        await sessionStorage.setItem('token_type', res.data.token_type)
        await sessionStorage.setItem('refresh_token', res.data.refresh_token)
  }
}
