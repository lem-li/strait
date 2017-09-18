<%@ page 	contentType="text/html; charset=utf-8" %>
<%@ page 	import="javax.servlet.ServletInputStream" %>
<%@ page 	import="java.util.*" %>
<%@ page 	import="java.io.*" %>

<html>
<head>
<title>get method</title>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
</head>
<body>
<%
	request.setCharacterEncoding("utf-8");

		String name = null;
		String value = null;
		boolean fileFlag = false;
		// TMP_DIR
		String TMP_DIR = "C:\\";
		File tmpFile = null;
		//file name
		String fName = null;
		
        FileOutputStream baos = null;
        BufferedOutputStream bos = null;
		Hashtable paramHt = new Hashtable();
int BUFSIZE = 1024 * 8;		
		int rtnPos = 0;
		byte[] buffs = new byte[ BUFSIZE * 8 ];
		String contentType = request.getContentType();
		int index = contentType.indexOf( "boundary=" );
String boundary = "--" + contentType.substring( index + 9 );
       		String endBoundary = boundary + "--";
		ServletInputStream sis = request.getInputStream();
		while( (rtnPos = sis.readLine( buffs, 0, buffs.length )) != -1 ){
			String strBuff = new String( buffs, 0, rtnPos );
			if( strBuff.startsWith( boundary ) ){
				if ( name != null && name.trim().length() > 0 ){
					if (fileFlag ){
                        bos.flush();
                        baos.close();
                        bos.close();
                        baos = null;
           bos = null; 
}else{
						Object obj = paramHt.get(name);
						ArrayList al = null;
if ( obj == null ){										al = new ArrayList();
}else{
	al = (ArrayList)obj;	
}
al.add(value);
paramHt.put(name, al);
}
				}
    				name = new String();
				value = new String();
				fileFlag = false;

rtnPos = sis.readLine( buffs, 0, buffs.length );
if (rtnPos != -1 ){
strBuff = new String( buffs, 0, rtnPos );
           			if (strBuff.toLowerCase().startsWith( "content-disposition: form-data; " )){
                					int nIndex = strBuff.toLowerCase().indexOf( "name=\"" );
                					int nLastIndex = strBuff.toLowerCase().indexOf( "\"", nIndex + 6 );
            name = strBuff.substring( nIndex + 6, nLastIndex );
}
           			int fIndex = strBuff.toLowerCase().indexOf( "filename=\"" );
					if (fIndex != -1 ){
	fileFlag = true;
						int fLastIndex = strBuff.toLowerCase().indexOf( "\"", fIndex + 10 );
         fName = strBuff.substring( fIndex + 10 , fLastIndex );
	        					fIndex = fName.lastIndexOf( "\\" );
        						if( fIndex == -1 ){
            						fIndex = fName.lastIndexOf( "/" );
            						if( fIndex != -1 ){
								fName = fName.substring( fIndex + 1 );
            						}
        							}else{
	fName = fName.substring( fIndex + 1 );
}
if (fName == null || fName.trim().length() == 0){
	fileFlag = false;
	sis.readLine( buffs, 0, buffs.length );
sis.readLine( buffs, 0, buffs.length );
sis.readLine( buffs, 0, buffs.length );
continue;
}
}
sis.readLine( buffs, 0, buffs.length );
sis.readLine( buffs, 0, buffs.length );
				}

}else if( strBuff.startsWith( endBoundary ) ){
           		
				if ( name != null && name.trim().length() > 0 ){
                  			
					if (fileFlag ){

                        bos.flush();
                        baos.close();
                        bos.close();
                        baos = null;
           bos = null; 
}else{
                  		
						Object obj = paramHt.get(name);
						ArrayList al = null;
if ( obj == null ){										al = new ArrayList();
}else{
	al = (ArrayList)obj;	
}
al.add(value);

paramHt.put(name, al);
}
				}
}else{
           		if (fileFlag ){
                if ( baos == null && bos == null ) {
                       tmpFile = new File( TMP_DIR + fName );
                       baos = new FileOutputStream( tmpFile );
                        bos = new BufferedOutputStream( baos );
                }
					bos.write( buffs, 0, rtnPos );
baos.flush();
}else{
	value = value + strBuff;
}
			}
		}
%>
</body>
</html>
