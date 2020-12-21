import React,{useState,useEffect} from 'react';
import '../../css/app.css';
import ReactDOM from 'react-dom';
import axios from 'axios';

function Show() {
    const [data,setData]=useState([]);
    const [name,setName]=useState("");
    const [change,setChange]=useState("");
    const [userid,setuserid]=useState("");
    const [price,setPrice]=useState('');
    useEffect(()=>{
          var r=document.getElementById('useremail').value;
          setuserid(r);
    },[]);
    useEffect(()=>{
        var r=document.getElementById('useremail').value;
        axios.get(
            `http://localhost:8000/api/data?id=${r}`
        ).then(e=>setData(e.data)
            ).catch(err=>console.log('error'));  
            
    },[change])
     
    const submitHandler=(e)=>{
        e.preventDefault();
        if(name=='' || price==''){
          return 0;
        }
        else{
            axios.post('http://localhost:8000/api/data',{name:name,price:price,userid:userid}).then(e=>{ setChange('ds'+name+price);
            setName('');
            setPrice('');
            return('success');
        }).catch(err=>console.log(err));
        }
       
        
            
    }
    const itemdelete=(id)=>{
      axios.delete(`http://localhost:8000/api/data/${id}`);
      setChange(`${id} got deleted`);
    }
    const itemname=(e)=>{
     setName(e.target.value);
    }
    const itemprice=(e)=>{
     setPrice(e.target.value);
    }
    function Datareturn(){
        let r=0;
        return(
            data.map(e=>
            <tbody key={e.id}>
<tr >
    <td>{r=r+1}</td>
    <td>{e.name}</td>
    <td>{e.price}</td>
    <td>
    <button onClick={()=>itemdelete(e.id)} className="btn btn-danger ">delete</button> 
<a href={`/edit/${e.id}`}><button  className="btn btn-primary ml-4">Edit</button>
    </a> 
    </td>
</tr>


            </tbody>

 )
        )
    }
    return (
        <div className="container">
            
            <center>
                <form action="post" className="form-group" onSubmit={submitHandler}>
                <input type="text" name="name" placeholder="name" className="form-control mb-3" onChange={itemname} value={name}/>
                <input type="text" name="price" placeholder="price" className="form-control mb-3" onChange={itemprice} value={price}/>
                <input type="text" name="username" className="form-control mb-3 userform" defaultValue={userid}/>
                <button type="submit" className="form-control btn-success">click to save</button>
                </form>
                {data?
(
        <table >
   <thead> 
   <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Price</td>
    <td>Options</td>
    </tr>   
   </thead>
    
<Datareturn/>
 </table>

)
           
            :('nothing')
            }
             
            </center>
            
             </div>
    );
}

export default Show;

if (document.getElementById('root')) {
    ReactDOM.render(<Show />, document.getElementById('root'));
}
