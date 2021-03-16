import json
def lambda_handler(event, context):
    print('event', 'pathParameters' in event);
    content = '<h2>Welcome</h2>Hello, WEB'
    if 'pathParameters' in event:
        id = event['pathParameters']['id']
        if id == '1':
            content = '<h2>HTML</h2>HTML is ...'
        elif id == '2':
            content = '<h2>CSS</h2>CSS is ...'
        elif id == '3':
            content = '<h2>JavaScript</h2>JavaScript is ...'
    return {
        'statusCode': 200,
        'headers':{
            'Content-type': 'text/html'
        },
        'body': '''
        <h1><a href="/">WEB</a></h1>
        <ol>
            <li><a href="/1">html</a></li>
            <li><a href="/2">css</a></li>
        </ol>
        '''+content
    }