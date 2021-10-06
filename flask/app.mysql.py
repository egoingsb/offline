from flask import Flask, request, redirect
import time
import pymysql

app = Flask(__name__)

DB_HOST="database-1.cdbrt00yi2pz.ap-northeast-2.rds.amazonaws.com"
DB_USER="admin"
DB_PASS="11111111"
DB_DATABASE="myflask"


@app.route('/create_process', methods=['POST'])
def create_process():
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor=cnt.cursor()
    title = request.form.get('title')
    body = request.form.get('body')
    sql = "INSERT INTO topic (title, body) VALUES('"+title+"','"+body+"')"
    result = cursor.execute(sql)
    cnt.commit()
    url = '/read/'+str(cursor.lastrowid)
    return redirect(url) 

@app.route('/delete_process', methods=['POST'])
def delete_process():
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor = cnt.cursor()
    id = request.form.get('id')    
    sql = "DELETE FROM topic WHERE id="+id
    result = cursor.execute(sql)
    cnt.commit()    
    return redirect('/')

@app.route('/update_process', methods=['POST'])
def update_process():
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor = cnt.cursor()
    id = request.form.get('id')    
    title = request.form.get('title')
    body = request.form.get('body')
    sql = "UPDATE topic SET title='"+title+"', body='"+body+"' WHERE id="+id
    result = cursor.execute(sql)
    cnt.commit()    
    return redirect('/read/'+id)

@app.route('/update/<topicid>')
def update(topicid):
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor=cnt.cursor()
    cursor.execute('SELECT id,title,body FROM topic')
    topics = cursor.fetchall()    
    contents = '<h1><a href="/">Web</a></h1>'
    contents += '<ol>'
    for id, title,body in topics:
        contents += '<li><a href="/read/'+str(id)+'">'+title+'</a></li>'
    contents += '</ol>'
    
    cursor=cnt.cursor()
    cursor.execute('SELECT * FROM topic WHERE id='+topicid)
    topic = cursor.fetchone()

    contents +='<h2>Update</h2>'
    contents += '''
        <form method="post" action="/update_process">
            <input type="hidden" name="id" value="'''+topicid+'''">
            <p><input type="text" name="title" value="'''+topic[1]+'''" placeholder="title" ></p>
            <p><textarea name="body" placeholder="body">'''+topic[2]+'''</textarea></p>
            <p><input type="submit" value="update"></p>
        </form> 
    '''
    return contents

@app.route('/create')
def create():
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor=cnt.cursor()
    cursor.execute('SELECT id,title,body FROM topic')
    topics = cursor.fetchall()    
    contents = '<h1><a href="/">Web</a></h1>'
    contents += '<ol>'
    for id, title,body in topics: 
        contents += '<li><a href="/read/'+str(id)+'">'+title+'</a></li>'
    contents += '</ol>'

    contents +='<h2>Create</h2>'
    contents += '''
        <form method="post" action="/create_process">
            <p><input type="text" name="title" placeholder="title" ></p>
            <p><textarea name="body" placeholder="body" ></textarea></p>
            <p><input type="submit" value="create"></p>
        </form> 
    '''
    return contents

@app.route('/read/<topicid>')
def read_topic(topicid ):
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor=cnt.cursor()
    cursor.execute('SELECT id,title,body FROM topic')
    topics = cursor.fetchall()    
    contents = '<h1><a href="/">Web</a></h1>'
    contents += '<ol>'
    for id, title, body in topics: 
        contents += '<li><a href="/read/'+str(id)+'">'+title+'</a></li>'
    contents += '</ol>'

    cursor=cnt.cursor()
    cursor.execute('SELECT id,title,body FROM topic WHERE id='+topicid)
    topic = cursor.fetchone()
    contents += '<h1>'+topic[1]+'</h1>'+topic[2]
    contents += '<p><a href="/create">create</a></p>'
    contents += '<p><a href="/update/'+topicid+'">update</a></p>'
    contents += '''
                <p>
                    <form action="/delete_process" method="post">
                        <input type="hidden" name="id" value="'''+topicid+'''">
                        <input type="submit" value="delete">
                    </form>
                </p>'''
    return contents
@app.route('/')
def home():
    cnt = pymysql.connect(host=DB_HOST,user=DB_USER,password=DB_PASS,database=DB_DATABASE)
    cursor=cnt.cursor()
    cursor.execute('SELECT id,title,body FROM topic')
    topics = cursor.fetchall()
    print('topics', topics)
    contents = '<h1><a href="/">Web</a></h1>'
    contents += '<ol>'
    for id, title, body in topics: 
        contents += '<li><a href="/read/'+str(id)+'">'+title+'</a></li>'
    contents += '</ol>'
    contents +='<h2>Welcome</h2>Hello, WEB'
    return contents+'<p><a href="/create">create</a></p>'

app.run(debug=True,host="0.0.0.0",port="8000")
