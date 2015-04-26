<?php
/*************************************************************************************
 * groovy.php
 * ----------
 * Author: Ivan F. Villanueva B. (geshi_groovy@artificialidea.com)
 * Copyright: (c) 2006 Ivan F. Villanueva B.(http://www.artificialidea.com)
 * Release Version: 1.0.7.21
 * Date Started: 2006/04/29
 *
 * Groovy language file for GeSHi.
 *
 * Keywords from http: http://docs.codehaus.org/download/attachments/2715/groovy-reference-card.pdf?version=1
 *
 * CHANGES
 * -------
 * 2006/04/29 (1.0.0)
 *   -  First Release
 *
 * TODO (updated 2006/04/29)
 * -------------------------
 * Testing
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array (
	'LANG_NAME' => 'Groovy',
	'COMMENT_SINGLE' => array(1 => '//', 2 => 'import', 3 => '#'),
	'COMMENT_MULTI' => array('/*' => '*/'),
	'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
	'QUOTEMARKS' => array("'''", '"""', "'", '"'),
	'ESCAPE_CHAR' => '\\',
	'KEYWORDS' => array(
		1 => array(
			'||',
			'while',
			'switch',
			'in',
			'if',
			'foreach',
			'for',
			'else',
			'do',
			'case',
			'=gt;',
			'--',
			'++',
			'&lt;&lt;',
			'&lt;&lt;&lt;',
			'&&'
			),
		2 => array(
			'volatile',
			'try',
			'true',
			'transient',
			'throws',
			'throw',
			'this',
			'synchronized',
			'super',
			'strictfp',
			'static',
			'return',
			'public',
			'protected',
			'property',
			'private',
			'package',
			'null',
			'new',
			'native',
			'interface',
			'instanceof',
			'implements',
			'goto',
			'finally',
			'final',
			'false',
			'extends',
			'enum',
			'default',
			'def',
			'continue',
			'const',
			'class',
			'catch',
			'break',
			'assert',
			'abstract',
			'as'
			),
		3 => array(
			'_Remote_Stub',
			'_PolicyStub',
			'_NamingContextStub',
			'_NamingContextImplBase',
			'_IDLTypeStub',
			'_BindingIteratorStub',
			'_BindingIteratorImplBase',
			'ZoneView',
			'ZipOutputStream',
			'ZipInputStream',
			'ZipFile',
			'ZipException',
			'ZipEntry',
			'X509Extension',
			'X509EncodedKeySpec',
			'X509Certificate',
			'X509CRLEntry',
			'X509CRL',
			'WrongTransaction',
			'Writer',
			'WriteAbortedException',
			'WritableRenderedImage',
			'WritableRaster',
			'WrappedPlainView',
			'WindowListener',
			'WindowEvent',
			'WindowConstants',
			'WindowAdapter',
			'Window',
			'WeakReference',
			'WeakHashMap',
			'WStringValueHelper',
			'WCharSeqHolder',
			'WCharSeqHelper',
			'Void',
			'VoiceStatus',
			'VisibilityHelper',
			'Visibility',
			'VirtualMachineError',
			'ViewportUI',
			'ViewportLayout',
			'ViewFactory',
			'View',
			'VetoableChangeSupport',
			'VetoableChangeListener',
			'VersionSpecHelper',
			'VerifyError',
			'Vector',
			'VariableHeightLayoutCache',
			'ValueMemberHelper',
			'ValueMember',
			'ValueHandler',
			'ValueFactory',
			'ValueBaseHolder',
			'ValueBaseHelper',
			'ValueBase',
			'VM_TRUNCATABLE',
			'VM_NONE',
			'VM_CUSTOM',
			'VM_ABSTRACT',
			'VMID',
			'Utilities',
			'UtilDelegate',
			'Util',
			'UserException',
			'UnsupportedOperationException',
			'UnsupportedLookAndFeelException',
			'UnsupportedFlavorException',
			'UnsupportedEncodingException',
			'UnsupportedClassVersionError',
			'UnsupportedAudioFileException',
			'UnsolicitedNotificationListener',
			'UnsolicitedNotificationEvent',
			'UnsolicitedNotification',
			'UnsatisfiedLinkError',
			'UnresolvedPermission',
			'Unreferenced',
			'UnrecoverableKeyException',
			'UnmarshalException',
			'UnknownUserException',
			'UnknownServiceException',
			'UnknownObjectException',
			'UnknownHostException',
			'UnknownHostException',
			'UnknownGroupException',
			'UnknownException',
			'UnknownError',
			'UnionMemberHelper',
			'UnionMember',
			'UnicastRemoteObject',
			'UnexpectedException',
			'UndoableEditSupport',
			'UndoableEditListener',
			'UndoableEditEvent',
			'UndoableEdit',
			'UndoManager',
			'UndeclaredThrowableException',
			'UTFDataFormatException',
			'UShortSeqHolder',
			'UShortSeqHelper',
			'URLStreamHandlerFactory',
			'URLStreamHandler',
			'URLEncoder',
			'URLDecoder',
			'URLConnection',
			'URLClassLoader',
			'URL',
			'UNSUPPORTED_POLICY_VALUE',
			'UNSUPPORTED_POLICY',
			'UNKNOWN',
			'ULongSeqHolder',
			'ULongSeqHelper',
			'ULongLongSeqHolder',
			'ULongLongSeqHelper',
			'UIResource',
			'UIManager.LookAndFeelInfo',
			'UIManager',
			'UIDefaults.ProxyLazyValue',
			'UIDefaults.LazyValue',
			'UIDefaults.LazyInputMap',
			'UIDefaults.ActiveValue',
			'UIDefaults',
			'UID',
			'Types',
			'TypeMismatch',
			'TypeCodeHolder',
			'TypeCode',
			'TreeWillExpandListener',
			'TreeUI',
			'TreeSet',
			'TreeSelectionModel',
			'TreeSelectionListener',
			'TreeSelectionEvent',
			'TreePath',
			'TreeNode',
			'TreeModelListener',
			'TreeModelEvent',
			'TreeModel',
			'TreeMap',
			'TreeExpansionListener',
			'TreeExpansionEvent',
			'TreeCellRenderer',
			'TreeCellEditor',
			'Transparency',
			'Transmitter',
			'TransformAttribute',
			'Transferable',
			'TransactionRolledbackException',
			'TransactionRequiredException',
			'Track',
			'Toolkit',
			'ToolTipUI',
			'ToolTipManager',
			'ToolBarUI',
			'TooManyListenersException',
			'TitledBorder',
			'Timestamp',
			'TimerTask',
			'Timer',
			'Timer',
			'TimeZone',
			'TimeLimitExceededException',
			'Time',
			'TileObserver',
			'Tie',
			'Throwable',
			'ThreadLocal',
			'ThreadGroup',
			'ThreadDeath',
			'Thread',
			'TexturePaint',
			'TextUI',
			'TextMeasurer',
			'TextListener',
			'TextLayout.CaretPolicy',
			'TextLayout',
			'TextHitInfo',
			'TextField',
			'TextEvent',
			'TextComponent',
			'TextAttribute',
			'TextArea',
			'TextAction',
			'TargetDataLine',
			'TagElement',
			'TableView',
			'TableUI',
			'TableModelListener',
			'TableModelEvent',
			'TableModel',
			'TableHeaderUI',
			'TableColumnModelListener',
			'TableColumnModelEvent',
			'TableColumnModel',
			'TableColumn',
			'TableCellRenderer',
			'TableCellEditor',
			'TabbedPaneUI',
			'TabableView',
			'TabStop',
			'TabSet',
			'TabExpander',
			'TRANSIENT',
			'TRANSACTION_ROLLEDBACK',
			'TRANSACTION_REQUIRED',
			'TCKind',
			'SystemFlavorMap',
			'SystemException',
			'SystemColor',
			'System',
			'SysexMessage',
			'Synthesizer',
			'SyncFailedException',
			'SwingUtilities',
			'SwingPropertyChangeSupport',
			'SwingConstants',
			'StyledEditorKit.UnderlineAction',
			'StyledEditorKit.StyledTextAction',
			'StyledEditorKit.ItalicAction',
			'StyledEditorKit.ForegroundAction',
			'StyledEditorKit.FontSizeAction',
			'StyledEditorKit.FontFamilyAction',
			'StyledEditorKit.BoldAction',
			'StyledEditorKit.AlignmentAction',
			'StyledEditorKit',
			'StyledDocument',
			'StyleSheet.ListPainter',
			'StyleSheet.BoxPainter',
			'StyleSheet',
			'StyleContext',
			'StyleConstants.ParagraphConstants',
			'StyleConstants.FontConstants',
			'StyleConstants.ColorConstants',
			'StyleConstants.CharacterConstants',
			'StyleConstants',
			'Style',
			'StubNotFoundException',
			'StubDelegate',
			'Stub',
			'StructMemberHelper',
			'StructMember',
			'Struct',
			'Stroke',
			'StringWriter',
			'StringValueHelper',
			'StringTokenizer',
			'StringSelection',
			'StringRefAddr',
			'StringReader',
			'StringIndexOutOfBoundsException',
			'StringHolder',
			'StringContent',
			'StringCharacterIterator',
			'StringBufferInputStream',
			'StringBuffer',
			'String',
			'StrictMath',
			'StreamableValue',
			'Streamable',
			'StreamTokenizer',
			'StreamCorruptedException',
			'Statement',
			'StateFactory',
			'StateEditable',
			'StateEdit',
			'StackOverflowError',
			'Stack',
			'SplitPaneUI',
			'SourceDataLine',
			'SoundbankResource',
			'SoundbankReader',
			'Soundbank',
			'SortedSet',
			'SortedMap',
			'SoftReference',
			'SoftBevelBorder',
			'SocketSecurityException',
			'SocketPermission',
			'SocketOptions',
			'SocketImplFactory',
			'SocketImpl',
			'SocketException',
			'Socket',
			'SliderUI',
			'SkeletonNotFoundException',
			'SkeletonMismatchException',
			'Skeleton',
			'SizeSequence',
			'SizeRequirements',
			'SizeLimitExceededException',
			'SingleSelectionModel',
			'SinglePixelPackedSampleModel',
			'SimpleTimeZone',
			'SimpleDateFormat',
			'SimpleBeanInfo',
			'SimpleAttributeSet',
			'Signer',
			'SignedObject',
			'SignatureSpi',
			'SignatureException',
			'Signature',
			'ShortSeqHolder',
			'ShortSeqHelper',
			'ShortMessage',
			'ShortLookupTable',
			'ShortHolder',
			'Short',
			'ShapeGraphicAttribute',
			'Shape',
			'SetOverrideTypeHelper',
			'SetOverrideType',
			'Set',
			'ServiceUnavailableException',
			'ServiceInformationHolder',
			'ServiceInformationHelper',
			'ServiceInformation',
			'ServiceDetailHelper',
			'ServiceDetail',
			'ServerSocket',
			'ServerRuntimeException',
			'ServerRequest',
			'ServerRef',
			'ServerNotActiveException',
			'ServerException',
			'ServerError',
			'ServerCloneException',
			'ServantObject',
			'SerializablePermission',
			'Serializable',
			'Sequencer.SyncMode',
			'Sequencer',
			'SequenceInputStream',
			'Sequence',
			'SeparatorUI',
			'Segment',
			'SecurityPermission',
			'SecurityManager',
			'SecurityException',
			'Security',
			'SecureRandomSpi',
			'SecureRandom',
			'SecureClassLoader',
			'SearchResult',
			'SearchControls',
			'Scrollbar',
			'Scrollable',
			'ScrollPaneUI',
			'ScrollPaneLayout.UIResource',
			'ScrollPaneLayout',
			'ScrollPaneConstants',
			'ScrollPane',
			'ScrollBarUI',
			'SchemaViolationException',
			'SampleModel',
			'SQLWarning',
			'SQLPermission',
			'SQLOutput',
			'SQLInput',
			'SQLException',
			'SQLData',
			'RuntimePermission',
			'RuntimeException',
			'Runtime',
			'Runnable',
			'RunTimeOperations',
			'RunTime',
			'RuleBasedCollator',
			'RowMapper',
			'RoundRectangle2D.Float',
			'RoundRectangle2D.Double',
			'RoundRectangle2D',
			'RootPaneUI',
			'RootPaneContainer',
			'Robot',
			'ReverbType',
			'ResultSetMetaData',
			'ResultSet',
			'ResponseHandler',
			'ResourceBundle',
			'Resolver',
			'ResolveResult',
			'RescaleOp',
			'Request',
			'RepositoryIdHelper',
			'Repository',
			'ReplicateScaleFilter',
			'RepaintManager',
			'RenderingHints.Key',
			'RenderingHints',
			'Renderer',
			'RenderedImageFactory',
			'RenderedImage',
			'RenderableImageProducer',
			'RenderableImageOp',
			'RenderableImage',
			'RenderContext',
			'RemoteStub',
			'RemoteServer',
			'RemoteRef',
			'RemoteObject',
			'RemoteException',
			'RemoteCall',
			'Remote',
			'RemarshalException',
			'RegistryHandler',
			'Registry',
			'ReflectPermission',
			'ReferralException',
			'Referenceable',
			'ReferenceQueue',
			'Reference',
			'RefAddr',
			'Ref',
			'RectangularShape',
			'Rectangle2D.Float',
			'Rectangle2D.Double',
			'Rectangle2D',
			'Rectangle',
			'Receiver',
			'Reader',
			'RasterOp',
			'RasterFormatException',
			'Raster',
			'RandomAccessFile',
			'Random',
			'RTFEditorKit',
			'RSAPublicKeySpec',
			'RSAPublicKey',
			'RSAPrivateKeySpec',
			'RSAPrivateKey',
			'RSAPrivateCrtKeySpec',
			'RSAPrivateCrtKey',
			'RSAKeyGenParameterSpec',
			'RSAKey',
			'RMISocketFactory',
			'RMIServerSocketFactory',
			'RMISecurityManager',
			'RMISecurityException',
			'RMIFailureHandler',
			'RMIClientSocketFactory',
			'RMIClassLoader',
			'RGBImageFilter',
			'QuadCurve2D.Float',
			'QuadCurve2D.Double',
			'QuadCurve2D',
			'PushbackReader',
			'PushbackInputStream',
			'PublicKey',
			'Proxy',
			'ProviderException',
			'Provider',
			'ProtocolException',
			'ProtectionDomain',
			'PropertyVetoException',
			'PropertyResourceBundle',
			'PropertyPermission',
			'PropertyEditorSupport',
			'PropertyEditorManager',
			'PropertyEditor',
			'PropertyDescriptor',
			'PropertyChangeSupport',
			'PropertyChangeListener',
			'PropertyChangeEvent',
			'Properties',
			'ProgressMonitorInputStream',
			'ProgressMonitor',
			'ProgressBarUI',
			'ProfileDataException',
			'Process',
			'PrivilegedExceptionAction',
			'PrivilegedActionException',
			'PrivilegedAction',
			'PrivateKey',
			'PrinterJob',
			'PrinterIOException',
			'PrinterGraphics',
			'PrinterException',
			'PrinterAbortException',
			'Printable',
			'PrintWriter',
			'PrintStream',
			'PrintJob',
			'PrintGraphics',
			'PrincipalHolder',
			'Principal',
			'Principal',
			'PreparedStatement',
			'Position.Bias',
			'Position',
			'PortableRemoteObjectDelegate',
			'PortableRemoteObject',
			'Port.Info',
			'Port',
			'PopupMenuUI',
			'PopupMenuListener',
			'PopupMenuEvent',
			'PopupMenu',
			'Polygon',
			'PolicyTypeHelper',
			'PolicyOperations',
			'PolicyListHolder',
			'PolicyListHelper',
			'PolicyHolder',
			'PolicyHelper',
			'PolicyError',
			'Policy',
			'Policy',
			'Point2D.Float',
			'Point2D.Double',
			'Point2D',
			'Point',
			'PlainView',
			'PlainDocument',
			'PixelInterleavedSampleModel',
			'PixelGrabber',
			'PipedWriter',
			'PipedReader',
			'PipedOutputStream',
			'PipedInputStream',
			'PhantomReference',
			'Permissions',
			'PermissionCollection',
			'Permission',
			'Permission',
			'PathIterator',
			'Patch',
			'PasswordView',
			'PasswordAuthentication',
			'PartialResultException',
			'ParserDelegator',
			'Parser',
			'ParsePosition',
			'ParseException',
			'ParameterDescriptor',
			'ParameterBlock',
			'ParagraphView',
			'ParagraphView',
			'Paper',
			'PanelUI',
			'Panel',
			'PaintEvent',
			'PaintContext',
			'Paint',
			'Pageable',
			'PageFormat',
			'PageAttributes.PrintQualityType',
			'PageAttributes.OriginType',
			'PageAttributes.OrientationRequestedType',
			'PageAttributes.MediaType',
			'PageAttributes.ColorType',
			'PageAttributes',
			'PackedColorModel',
			'Package',
			'PUBLIC_MEMBER',
			'PRIVATE_MEMBER',
			'PKCS8EncodedKeySpec',
			'PERSIST_STORE',
			'Owner',
			'OverlayLayout',
			'OutputStreamWriter',
			'OutputStream',
			'OutOfMemoryError',
			'OptionalDataException',
			'OptionPaneUI',
			'Option',
			'OperationNotSupportedException',
			'Operation',
			'OpenType',
			'OctetSeqHolder',
			'OctetSeqHelper',
			'Observer',
			'Observable',
			'ObjectView',
			'ObjectStreamField',
			'ObjectStreamException',
			'ObjectStreamConstants',
			'ObjectStreamClass',
			'ObjectOutputStream.PutField',
			'ObjectOutputStream',
			'ObjectOutput',
			'ObjectInputValidation',
			'ObjectInputStream.GetField',
			'ObjectInputStream',
			'ObjectInput',
			'ObjectImpl',
			'ObjectImpl',
			'ObjectHolder',
			'ObjectHelper',
			'ObjectFactoryBuilder',
			'ObjectFactory',
			'ObjectChangeListener',
			'Object',
			'ObjID',
			'ORB',
			'OMGVMCID',
			'OBJ_ADAPTER',
			'OBJECT_NOT_EXIST',
			'NumberFormatException',
			'NumberFormat',
			'Number',
			'NullPointerException',
			'NotSerializableException',
			'NotOwnerException',
			'NotFoundReasonHolder',
			'NotFoundReasonHelper',
			'NotFoundReason',
			'NotFoundHolder',
			'NotFoundHelper',
			'NotFound',
			'NotEmptyHolder',
			'NotEmptyHelper',
			'NotEmpty',
			'NotContextException',
			'NotBoundException',
			'NotActiveException',
			'NoninvertibleTransformException',
			'NoSuchProviderException',
			'NoSuchObjectException',
			'NoSuchMethodException',
			'NoSuchMethodError',
			'NoSuchFieldException',
			'NoSuchFieldError',
			'NoSuchElementException',
			'NoSuchAttributeException',
			'NoSuchAlgorithmException',
			'NoRouteToHostException',
			'NoPermissionException',
			'NoInitialContextException',
			'NoClassDefFoundError',
			'NetPermission',
			'NegativeArraySizeException',
			'NamingSecurityException',
			'NamingManager',
			'NamingListener',
			'NamingExceptionEvent',
			'NamingException',
			'NamingEvent',
			'NamingEnumeration',
			'NamingContextOperations',
			'NamingContextHolder',
			'NamingContextHelper',
			'NamingContext',
			'Naming',
			'NamespaceChangeListener',
			'NamedValue',
			'NameValuePairHelper',
			'NameValuePair',
			'NameParser',
			'NameNotFoundException',
			'NameHolder',
			'NameHelper',
			'NameComponentHolder',
			'NameComponentHelper',
			'NameComponent',
			'NameClassPair',
			'NameAlreadyBoundException',
			'Name',
			'NVList',
			'NO_RESPONSE',
			'NO_RESOURCES',
			'NO_PERMISSION',
			'NO_MEMORY',
			'NO_IMPLEMENT',
			'MutableTreeNode',
			'MutableComboBoxModel',
			'MutableAttributeSet',
			'MultipleMaster',
			'MulticastSocket',
			'MultiViewportUI',
			'MultiTreeUI',
			'MultiToolTipUI',
			'MultiToolBarUI',
			'MultiTextUI',
			'MultiTableUI',
			'MultiTableHeaderUI',
			'MultiTabbedPaneUI',
			'MultiSplitPaneUI',
			'MultiSliderUI',
			'MultiSeparatorUI',
			'MultiScrollPaneUI',
			'MultiScrollBarUI',
			'MultiProgressBarUI',
			'MultiPopupMenuUI',
			'MultiPixelPackedSampleModel',
			'MultiPanelUI',
			'MultiOptionPaneUI',
			'MultiMenuItemUI',
			'MultiMenuBarUI',
			'MultiLookAndFeel',
			'MultiListUI',
			'MultiLabelUI',
			'MultiInternalFrameUI',
			'MultiFileChooserUI',
			'MultiDesktopPaneUI',
			'MultiDesktopIconUI',
			'MultiComboBoxUI',
			'MultiColorChooserUI',
			'MultiButtonUI',
			'MouseMotionListener',
			'MouseMotionAdapter',
			'MouseListener',
			'MouseInputListener',
			'MouseInputAdapter',
			'MouseEvent',
			'MouseDragGestureRecognizer',
			'MouseAdapter',
			'Modifier',
			'ModificationItem',
			'MixerProvider',
			'Mixer.Info',
			'Mixer',
			'MissingResourceException',
			'MinimalHTMLWriter',
			'MimeTypeParseException',
			'MidiUnavailableException',
			'MidiSystem',
			'MidiMessage',
			'MidiFileWriter',
			'MidiFileReader',
			'MidiFileFormat',
			'MidiEvent',
			'MidiDeviceProvider',
			'MidiDevice.Info',
			'MidiDevice',
			'MidiChannel',
			'MethodDescriptor',
			'Method',
			'MetalTreeUI',
			'MetalToolTipUI',
			'MetalToolBarUI',
			'MetalToggleButtonUI',
			'MetalTheme',
			'MetalTextFieldUI',
			'MetalTabbedPaneUI',
			'MetalSplitPaneUI',
			'MetalSliderUI',
			'MetalSeparatorUI',
			'MetalScrollPaneUI',
			'MetalScrollButton',
			'MetalScrollBarUI',
			'MetalRadioButtonUI',
			'MetalProgressBarUI',
			'MetalPopupMenuSeparatorUI',
			'MetalLookAndFeel',
			'MetalLabelUI',
			'MetalInternalFrameUI',
			'MetalInternalFrameTitlePane',
			'MetalIconFactory.TreeLeafIcon',
			'MetalIconFactory.TreeFolderIcon',
			'MetalIconFactory.TreeControlIcon',
			'MetalIconFactory.PaletteCloseIcon',
			'MetalIconFactory.FolderIcon16',
			'MetalIconFactory.FileIcon16',
			'MetalIconFactory',
			'MetalFileChooserUI',
			'MetalDesktopIconUI',
			'MetalComboBoxUI',
			'MetalComboBoxIcon',
			'MetalComboBoxEditor.UIResource',
			'MetalComboBoxEditor',
			'MetalComboBoxButton',
			'MetalCheckBoxUI',
			'MetalCheckBoxIcon',
			'MetalButtonUI',
			'MetalBorders.ToolBarBorder',
			'MetalBorders.ToggleButtonBorder',
			'MetalBorders.TextFieldBorder',
			'MetalBorders.TableHeaderBorder',
			'MetalBorders.ScrollPaneBorder',
			'MetalBorders.RolloverButtonBorder',
			'MetalBorders.PopupMenuBorder',
			'MetalBorders.PaletteBorder',
			'MetalBorders.OptionDialogBorder',
			'MetalBorders.MenuItemBorder',
			'MetalBorders.MenuBarBorder',
			'MetalBorders.InternalFrameBorder',
			'MetalBorders.Flush3DBorder',
			'MetalBorders.ButtonBorder',
			'MetalBorders',
			'MetaMessage',
			'MetaEventListener',
			'MessageFormat',
			'MessageDigestSpi',
			'MessageDigest',
			'MenuShortcut',
			'MenuSelectionManager',
			'MenuListener',
			'MenuKeyListener',
			'MenuKeyEvent',
			'MenuItemUI',
			'MenuItem',
			'MenuEvent',
			'MenuElement',
			'MenuDragMouseListener',
			'MenuDragMouseEvent',
			'MenuContainer',
			'MenuComponent',
			'MenuBarUI',
			'MenuBar',
			'Menu',
			'MemoryImageSource',
			'Member',
			'MediaTracker',
			'MatteBorder',
			'Math',
			'MarshalledObject',
			'MarshalException',
			'Map.Entry',
			'Map',
			'Manifest',
			'MalformedURLException',
			'MalformedLinkException',
			'MARSHAL',
			'LookupTable',
			'LookupOp',
			'LookAndFeel',
			'LongSeqHolder',
			'LongSeqHelper',
			'LongLongSeqHolder',
			'LongLongSeqHelper',
			'LongHolder',
			'Long',
			'LogStream',
			'LocateRegistry',
			'Locale',
			'LoaderHandler',
			'ListView',
			'ListUI',
			'ListSelectionModel',
			'ListSelectionListener',
			'ListSelectionEvent',
			'ListResourceBundle',
			'ListModel',
			'ListIterator',
			'ListDataListener',
			'ListDataEvent',
			'ListCellRenderer',
			'List',
			'List',
			'LinkedList',
			'LinkageError',
			'LinkRef',
			'LinkLoopException',
			'LinkException',
			'LineUnavailableException',
			'LineNumberReader',
			'LineNumberInputStream',
			'LineMetrics',
			'LineListener',
			'LineEvent.Type',
			'LineEvent',
			'LineBreakMeasurer',
			'LineBorder',
			'Line2D.Float',
			'Line2D.Double',
			'Line2D',
			'Line.Info',
			'Line',
			'LimitExceededException',
			'Lease',
			'LdapReferralException',
			'LdapContext',
			'LayoutQueue',
			'LayoutManager2',
			'LayoutManager',
			'LayeredHighlighter.LayerPainter',
			'LayeredHighlighter',
			'LastOwnerException',
			'LabelView',
			'LabelUI',
			'Label',
			'Keymap',
			'KeyStroke',
			'KeyStoreSpi',
			'KeyStoreException',
			'KeyStore',
			'KeySpec',
			'KeyPairGeneratorSpi',
			'KeyPairGenerator',
			'KeyPair',
			'KeyManagementException',
			'KeyListener',
			'KeyFactorySpi',
			'KeyFactory',
			'KeyException',
			'KeyEvent',
			'KeyAdapter',
			'Key',
			'Kernel',
			'JobAttributes.SidesType',
			'JobAttributes.MultipleDocumentHandlingType',
			'JobAttributes.DialogType',
			'JobAttributes.DestinationType',
			'JobAttributes.DefaultSelectionType',
			'JobAttributes',
			'JarURLConnection',
			'JarOutputStream',
			'JarInputStream',
			'JarFile',
			'JarException',
			'JarEntry',
			'JWindow',
			'JViewport',
			'JTree.EmptySelectionModel',
			'JTree.DynamicUtilTreeNode',
			'JTree',
			'JToolTip',
			'JToolBar.Separator',
			'JToolBar',
			'JToggleButton.ToggleButtonModel',
			'JToggleButton',
			'JTextPane',
			'JTextField',
			'JTextComponent.KeyBinding',
			'JTextComponent',
			'JTextArea',
			'JTableHeader',
			'JTable',
			'JTabbedPane',
			'JSplitPane',
			'JSlider',
			'JSeparator',
			'JScrollPane',
			'JScrollBar',
			'JRootPane',
			'JRadioButtonMenuItem',
			'JRadioButton',
			'JProgressBar',
			'JPopupMenu.Separator',
			'JPopupMenu',
			'JPasswordField',
			'JPanel',
			'JOptionPane',
			'JMenuItem',
			'JMenuBar',
			'JMenu',
			'JList',
			'JLayeredPane',
			'JLabel',
			'JInternalFrame.JDesktopIcon',
			'JInternalFrame',
			'JFrame',
			'JFileChooser',
			'JEditorPane',
			'JDialog',
			'JDesktopPane',
			'JComponent',
			'JComboBox.KeySelectionManager',
			'JComboBox',
			'JColorChooser',
			'JCheckBoxMenuItem',
			'JCheckBox',
			'JButton',
			'JApplet',
			'Iterator',
			'ItemSelectable',
			'ItemListener',
			'ItemEvent',
			'IstringHelper',
			'InvokeHandler',
			'InvocationTargetException',
			'InvocationHandler',
			'InvocationEvent',
			'InvalidValue',
			'InvalidTransactionException',
			'InvalidSeq',
			'InvalidSearchFilterException',
			'InvalidSearchControlsException',
			'InvalidParameterSpecException',
			'InvalidParameterException',
			'InvalidObjectException',
			'InvalidNameHolder',
			'InvalidNameHelper',
			'InvalidNameException',
			'InvalidName',
			'InvalidName',
			'InvalidMidiDataException',
			'InvalidKeySpecException',
			'InvalidKeyException',
			'InvalidDnDOperationException',
			'InvalidClassException',
			'InvalidAttributesException',
			'InvalidAttributeValueException',
			'InvalidAttributeIdentifierException',
			'InvalidAlgorithmParameterException',
			'Invalid',
			'Introspector',
			'IntrospectionException',
			'InterruptedNamingException',
			'InterruptedIOException',
			'InterruptedException',
			'InternalFrameUI',
			'InternalFrameListener',
			'InternalFrameEvent',
			'InternalFrameAdapter',
			'InternalError',
			'Integer',
			'IntHolder',
			'InsufficientResourcesException',
			'Instrument',
			'InstantiationException',
			'InstantiationError',
			'InsetsUIResource',
			'Insets',
			'InputVerifier',
			'InputSubset',
			'InputStreamReader',
			'InputStream',
			'InputStream',
			'InputStream',
			'InputMethodRequests',
			'InputMethodListener',
			'InputMethodHighlight',
			'InputMethodEvent',
			'InputMethodDescriptor',
			'InputMethodContext',
			'InputMethod',
			'InputMapUIResource',
			'InputMap',
			'InputEvent',
			'InputContext',
			'InlineView',
			'Initializer',
			'InitialLdapContext',
			'InitialDirContext',
			'InitialContextFactoryBuilder',
			'InitialContextFactory',
			'InitialContext',
			'InheritableThreadLocal',
			'InflaterInputStream',
			'Inflater',
			'InetAddress',
			'IndirectionException',
			'IndexedPropertyDescriptor',
			'IndexOutOfBoundsException',
			'IndexColorModel',
			'InconsistentTypeCode',
			'IncompatibleClassChangeError',
			'ImagingOpException',
			'ImageProducer',
			'ImageObserver',
			'ImageIcon',
			'ImageGraphicAttribute',
			'ImageFilter',
			'ImageConsumer',
			'Image',
			'IllegalThreadStateException',
			'IllegalStateException',
			'IllegalPathStateException',
			'IllegalMonitorStateException',
			'IllegalComponentStateException',
			'IllegalArgumentException',
			'IllegalAccessException',
			'IllegalAccessError',
			'IdentityScope',
			'Identity',
			'IdentifierHelper',
			'IconView',
			'IconUIResource',
			'Icon',
			'IRObjectOperations',
			'IRObject',
			'IOException',
			'INV_POLICY',
			'INV_OBJREF',
			'INV_IDENT',
			'INV_FLAG',
			'INVALID_TRANSACTION',
			'INTF_REPOS',
			'INTERNAL',
			'INITIALIZE',
			'IMP_LIMIT',
			'IDLTypeOperations',
			'IDLTypeHelper',
			'IDLType',
			'IDLEntity',
			'ICC_ProfileRGB',
			'ICC_ProfileGray',
			'ICC_Profile',
			'ICC_ColorSpace',
			'HyperlinkListener',
			'HyperlinkEvent.EventType',
			'HyperlinkEvent',
			'HttpURLConnection',
			'Highlighter.HighlightPainter',
			'Highlighter.Highlight',
			'Highlighter',
			'HierarchyListener',
			'HierarchyEvent',
			'HierarchyBoundsListener',
			'HierarchyBoundsAdapter',
			'Hashtable',
			'HashSet',
			'HashMap',
			'HasControls',
			'HTMLWriter',
			'HTMLFrameHyperlinkEvent',
			'HTMLEditorKit.ParserCallback',
			'HTMLEditorKit.Parser',
			'HTMLEditorKit.LinkController',
			'HTMLEditorKit.InsertHTMLTextAction',
			'HTMLEditorKit.HTMLTextAction',
			'HTMLEditorKit.HTMLFactory',
			'HTMLEditorKit',
			'HTMLDocument.Iterator',
			'HTMLDocument',
			'HTML.UnknownTag',
			'HTML.Tag',
			'HTML.Attribute',
			'HTML',
			'GuardedObject',
			'Guard',
			'Group',
			'GridLayout',
			'GridBagLayout',
			'GridBagConstraints',
			'GregorianCalendar',
			'GrayFilter',
			'GraphicsEnvironment',
			'GraphicsDevice',
			'GraphicsConfiguration',
			'GraphicsConfigTemplate',
			'Graphics2D',
			'Graphics',
			'GraphicAttribute',
			'GradientPaint',
			'GlyphView.GlyphPainter',
			'GlyphView',
			'GlyphVector',
			'GlyphMetrics',
			'GlyphJustificationInfo',
			'GeneralSecurityException',
			'GeneralPath',
			'GapContent',
			'GZIPOutputStream',
			'GZIPInputStream',
			'Frame',
			'FormatConversionProvider',
			'Format',
			'FormView',
			'FontUIResource',
			'FontRenderContext',
			'FontMetrics',
			'FontFormatException',
			'Font',
			'FocusManager',
			'FocusListener',
			'FocusEvent',
			'FocusAdapter',
			'FlowView.FlowStrategy',
			'FlowView',
			'FlowLayout',
			'FloatSeqHolder',
			'FloatSeqHelper',
			'FloatHolder',
			'FloatControl.Type',
			'FloatControl',
			'Float',
			'FlavorMap',
			'FlatteningPathIterator',
			'FixedHolder',
			'FixedHeightLayoutCache',
			'FilteredImageSource',
			'FilterWriter',
			'FilterReader',
			'FilterOutputStream',
			'FilterInputStream',
			'FilenameFilter',
			'FileWriter',
			'FileView',
			'FileSystemView',
			'FileReader',
			'FilePermission',
			'FileOutputStream',
			'FileNotFoundException',
			'FileNameMap',
			'FileInputStream',
			'FileFilter',
			'FileFilter',
			'FileDialog',
			'FileDescriptor',
			'FileChooserUI',
			'File',
			'FieldView',
			'FieldPosition',
			'FieldNameHelper',
			'Field',
			'FeatureDescriptor',
			'FREE_MEM',
			'Externalizable',
			'ExtendedResponse',
			'ExtendedRequest',
			'ExportException',
			'ExpandVetoException',
			'ExceptionList',
			'ExceptionInInitializerError',
			'Exception',
			'EventSetDescriptor',
			'EventQueue',
			'EventObject',
			'EventListenerList',
			'EventListener',
			'EventDirContext',
			'EventContext',
			'Event',
			'EtchedBorder',
			'Error',
			'Environment',
			'Enumeration',
			'EnumControl.Type',
			'EnumControl',
			'Entity',
			'EncodedKeySpec',
			'EmptyStackException',
			'EmptyBorder',
			'Ellipse2D.Float',
			'Ellipse2D.Double',
			'Ellipse2D',
			'ElementIterator',
			'Element',
			'EditorKit',
			'EOFException',
			'DynamicImplementation',
			'DynValue',
			'DynUnion',
			'DynStruct',
			'DynSequence',
			'DynFixed',
			'DynEnum',
			'DynArray',
			'DynAny',
			'DropTargetListener',
			'DropTargetEvent',
			'DropTargetDropEvent',
			'DropTargetDragEvent',
			'DropTargetContext',
			'DropTarget.DropTargetAutoScroller',
			'DropTarget',
			'DriverPropertyInfo',
			'DriverManager',
			'Driver',
			'DragSourceListener',
			'DragSourceEvent',
			'DragSourceDropEvent',
			'DragSourceDragEvent',
			'DragSourceContext',
			'DragSource',
			'DragGestureRecognizer',
			'DragGestureListener',
			'DragGestureEvent',
			'DoubleSeqHolder',
			'DoubleSeqHelper',
			'DoubleHolder',
			'Double',
			'DomainManagerOperations',
			'DomainManager',
			'DomainCombiner',
			'DocumentParser',
			'DocumentListener',
			'DocumentEvent.EventType',
			'DocumentEvent.ElementChange',
			'DocumentEvent',
			'Document',
			'DnDConstants',
			'DirectoryManager',
			'DirectColorModel',
			'DirStateFactory.Result',
			'DirStateFactory',
			'DirObjectFactory',
			'DirContext',
			'DimensionUIResource',
			'Dimension2D',
			'Dimension',
			'DigestOutputStream',
			'DigestInputStream',
			'DigestException',
			'Dictionary',
			'Dialog',
			'DesktopPaneUI',
			'DesktopManager',
			'DesktopIconUI',
			'DesignMode',
			'Delegate',
			'DeflaterOutputStream',
			'Deflater',
			'DefinitionKindHelper',
			'DefinitionKind',
			'DefaultTreeSelectionModel',
			'DefaultTreeModel',
			'DefaultTreeCellRenderer',
			'DefaultTreeCellEditor',
			'DefaultTextUI',
			'DefaultTableModel',
			'DefaultTableColumnModel',
			'DefaultTableCellRenderer.UIResource',
			'DefaultTableCellRenderer',
			'DefaultStyledDocument.ElementSpec',
			'DefaultStyledDocument.AttributeUndoableEdit',
			'DefaultStyledDocument',
			'DefaultSingleSelectionModel',
			'DefaultMutableTreeNode',
			'DefaultMetalTheme',
			'DefaultMenuLayout',
			'DefaultListSelectionModel',
			'DefaultListModel',
			'DefaultListCellRenderer.UIResource',
			'DefaultListCellRenderer',
			'DefaultHighlighter.DefaultHighlightPainter',
			'DefaultHighlighter',
			'DefaultFocusManager',
			'DefaultEditorKit.PasteAction,',
			'DefaultEditorKit.InsertTabAction',
			'DefaultEditorKit.InsertContentAction',
			'DefaultEditorKit.InsertBreakAction',
			'DefaultEditorKit.DefaultKeyTypedAction',
			'DefaultEditorKit.CutAction',
			'DefaultEditorKit.CopyAction',
			'DefaultEditorKit.BeepAction',
			'DefaultEditorKit',
			'DefaultDesktopManager',
			'DefaultComboBoxModel',
			'DefaultColorSelectionModel',
			'DefaultCellEditor',
			'DefaultCaret',
			'DefaultButtonModel',
			'DefaultBoundedRangeModel',
			'DecimalFormatSymbols',
			'DecimalFormat',
			'DebugGraphics',
			'DateFormatSymbols',
			'DateFormat',
			'Date',
			'DatagramSocketImplFactory',
			'DatagramSocketImpl',
			'DatagramSocket',
			'DatagramPacket',
			'DatabaseMetaData',
			'DataTruncation',
			'DataOutputStream',
			'DataOutputStream',
			'DataOutput',
			'DataLine.Info',
			'DataLine',
			'DataInputStream',
			'DataInput',
			'DataFormatException',
			'DataFlavor',
			'DataBufferUShort',
			'DataBufferShort',
			'DataBufferInt',
			'DataBufferByte',
			'DataBuffer',
			'DTDConstants',
			'DTD',
			'DSAPublicKeySpec',
			'DSAPublicKey',
			'DSAPrivateKeySpec',
			'DSAPrivateKey',
			'DSAParams',
			'DSAParameterSpec',
			'DSAKeyPairGenerator',
			'DSAKey',
			'DGC',
			'DATA_CONVERSION',
			'Customizer',
			'CustomValue',
			'CustomMarshal',
			'Cursor',
			'CurrentOperations',
			'CurrentHolder',
			'CurrentHelper',
			'Current',
			'CubicCurve2D.Float',
			'CubicCurve2D.Double',
			'CubicCurve2D',
			'CropImageFilter',
			'ConvolveOp',
			'ControllerEventListener',
			'ControlFactory',
			'Control.Type',
			'Control',
			'ContextualRenderedImageFactory',
			'ContextNotEmptyException',
			'ContextList',
			'Context',
			'ContentModel',
			'ContentHandlerFactory',
			'ContentHandler',
			'ContainerListener',
			'ContainerEvent',
			'ContainerAdapter',
			'Container',
			'Constructor',
			'Connection',
			'ConnectIOException',
			'ConnectException',
			'ConnectException',
			'ConfigurationException',
			'ConcurrentModificationException',
			'CompoundName',
			'CompoundEdit',
			'CompoundControl.Type',
			'CompoundControl',
			'CompoundBorder',
			'CompositeView',
			'CompositeName',
			'CompositeContext',
			'Composite',
			'ComponentView',
			'ComponentUI',
			'ComponentSampleModel',
			'ComponentOrientation',
			'ComponentListener',
			'ComponentInputMapUIResource',
			'ComponentInputMap',
			'ComponentEvent',
			'ComponentColorModel',
			'ComponentAdapter',
			'Component',
			'CompletionStatusHelper',
			'CompletionStatus',
			'Compiler',
			'Comparator',
			'Comparable',
			'CommunicationException',
			'ComboPopup',
			'ComboBoxUI',
			'ComboBoxModel',
			'ComboBoxEditor',
			'ColorUIResource',
			'ColorSpace',
			'ColorSelectionModel',
			'ColorModel',
			'ColorConvertOp',
			'ColorChooserUI',
			'ColorChooserComponentFactory',
			'Color',
			'Collections',
			'Collection',
			'Collator',
			'CollationKey',
			'CollationElementIterator',
			'CodeSource',
			'Cloneable',
			'CloneNotSupportedException',
			'Clob',
			'ClipboardOwner',
			'Clipboard',
			'Clip',
			'ClassNotFoundException',
			'ClassLoader',
			'ClassFormatError',
			'ClassDesc',
			'ClassCircularityError',
			'ClassCastException',
			'Class',
			'ChoiceFormat',
			'Choice',
			'Checksum',
			'CheckedOutputStream',
			'CheckedInputStream',
			'CheckboxMenuItem',
			'CheckboxGroup',
			'Checkbox',
			'CharacterIterator',
			'Character.UnicodeBlock',
			'Character.Subset',
			'Character',
			'CharSeqHolder',
			'CharSeqHelper',
			'CharHolder',
			'CharConversionException',
			'CharArrayWriter',
			'CharArrayReader',
			'ChangedCharSetException',
			'ChangeListener',
			'ChangeEvent',
			'CertificateParsingException',
			'CertificateNotYetValidException',
			'CertificateFactorySpi',
			'CertificateFactory',
			'CertificateExpiredException',
			'CertificateException',
			'CertificateEncodingException',
			'Certificate.CertificateRep',
			'Certificate',
			'CellRendererPane',
			'CellEditorListener',
			'CellEditor',
			'CaretListener',
			'CaretEvent',
			'Caret',
			'CardLayout',
			'Canvas',
			'CannotUndoException',
			'CannotRedoException',
			'CannotProceedHolder',
			'CannotProceedHelper',
			'CannotProceedException',
			'CannotProceed',
			'CallableStatement',
			'Calendar',
			'CTX_RESTRICT_SCOPE',
			'CSS.Attribute',
			'CSS',
			'CRLException',
			'CRL',
			'CRC32',
			'COMM_FAILURE',
			'CMMException',
			'ByteLookupTable',
			'ByteHolder',
			'ByteArrayOutputStream',
			'ByteArrayInputStream',
			'Byte',
			'ButtonUI',
			'ButtonModel',
			'ButtonGroup',
			'Button',
			'BufferedWriter',
			'BufferedReader',
			'BufferedOutputStream',
			'BufferedInputStream',
			'BufferedImageOp',
			'BufferedImageFilter',
			'BufferedImage',
			'BreakIterator',
			'BoxedValueHelper',
			'BoxView',
			'BoxLayout',
			'Box.Filler',
			'Box',
			'Bounds',
			'BoundedRangeModel',
			'BorderUIResource.TitledBorderUIResource',
			'BorderUIResource.MatteBorderUIResource',
			'BorderUIResource.LineBorderUIResource',
			'BorderUIResource.EtchedBorderUIResource',
			'BorderUIResource.EmptyBorderUIResource',
			'BorderUIResource.CompoundBorderUIResource',
			'BorderUIResource.BevelBorderUIResource',
			'BorderUIResource',
			'BorderLayout',
			'BorderFactory',
			'Border',
			'BooleanSeqHolder',
			'BooleanSeqHelper',
			'BooleanHolder',
			'BooleanControl.Type',
			'BooleanControl',
			'Boolean',
			'Book',
			'BlockView',
			'Blob',
			'BitSet',
			'BindingTypeHolder',
			'BindingTypeHelper',
			'BindingType',
			'BindingListHolder',
			'BindingListHelper',
			'BindingIteratorOperations',
			'BindingIteratorHolder',
			'BindingIteratorHelper',
			'BindingIterator',
			'BindingHolder',
			'BindingHelper',
			'Binding',
			'BindException',
			'BinaryRefAddr',
			'BigInteger',
			'BigDecimal',
			'BevelBorder',
			'Beans',
			'BeanInfo',
			'BeanDescriptor',
			'BeanContextSupport.BCSIterator',
			'BeanContextSupport',
			'BeanContextServicesSupport.BCSSServiceProvider',
			'BeanContextServicesSupport',
			'BeanContextServicesListener',
			'BeanContextServices',
			'BeanContextServiceRevokedListener',
			'BeanContextServiceRevokedEvent',
			'BeanContextServiceProviderBeanInfo',
			'BeanContextServiceProvider',
			'BeanContextServiceAvailableEvent',
			'BeanContextProxy',
			'BeanContextMembershipListener',
			'BeanContextMembershipEvent',
			'BeanContextEvent',
			'BeanContextContainerProxy',
			'BeanContextChildSupport',
			'BeanContextChildComponentProxy',
			'BeanContextChild',
			'BeanContext',
			'BatchUpdateException',
			'BasicViewportUI',
			'BasicTreeUI',
			'BasicToolTipUI',
			'BasicToolBarUI',
			'BasicToolBarSeparatorUI',
			'BasicToggleButtonUI',
			'BasicTextUI.BasicHighlighter',
			'BasicTextUI.BasicCaret',
			'BasicTextUI',
			'BasicTextPaneUI',
			'BasicTextFieldUI',
			'BasicTextAreaUI',
			'BasicTableUI',
			'BasicTableHeaderUI',
			'BasicTabbedPaneUI',
			'BasicStroke',
			'BasicSplitPaneUI',
			'BasicSplitPaneDivider',
			'BasicSliderUI',
			'BasicSeparatorUI',
			'BasicScrollPaneUI',
			'BasicScrollBarUI',
			'BasicRootPaneUI',
			'BasicRadioButtonUI',
			'BasicRadioButtonMenuItemUI',
			'BasicProgressBarUI',
			'BasicPopupMenuUI',
			'BasicPopupMenuSeparatorUI',
			'BasicPermission',
			'BasicPasswordFieldUI',
			'BasicPanelUI',
			'BasicOptionPaneUI.ButtonAreaLayout',
			'BasicOptionPaneUI',
			'BasicMenuUI',
			'BasicMenuItemUI',
			'BasicMenuBarUI',
			'BasicLookAndFeel',
			'BasicListUI',
			'BasicLabelUI',
			'BasicInternalFrameUI',
			'BasicInternalFrameTitlePane',
			'BasicIconFactory',
			'BasicHTML',
			'BasicGraphicsUtils',
			'BasicFileChooserUI',
			'BasicEditorPaneUI',
			'BasicDirectoryModel',
			'BasicDesktopPaneUI',
			'BasicDesktopIconUI',
			'BasicComboPopup',
			'BasicComboBoxUI',
			'BasicComboBoxRenderer.UIResource',
			'BasicComboBoxRenderer',
			'BasicComboBoxEditor.UIResource',
			'BasicComboBoxEditor',
			'BasicColorChooserUI',
			'BasicCheckBoxUI',
			'BasicCheckBoxMenuItemUI',
			'BasicButtonUI',
			'BasicButtonListener',
			'BasicBorders.ToggleButtonBorder',
			'BasicBorders.SplitPaneBorder',
			'BasicBorders.RadioButtonBorder',
			'BasicBorders.MenuBarBorder',
			'BasicBorders.MarginBorder',
			'BasicBorders.FieldBorder',
			'BasicBorders.ButtonBorder',
			'BasicBorders',
			'BasicAttributes',
			'BasicAttribute',
			'BasicArrowButton',
			'BandedSampleModel',
			'BandCombineOp',
			'BadLocationException',
			'BadKind',
			'BAD_TYPECODE',
			'BAD_POLICY_VALUE',
			'BAD_POLICY_TYPE',
			'BAD_POLICY',
			'BAD_PARAM',
			'BAD_OPERATION',
			'BAD_INV_ORDER',
			'BAD_CONTEXT',
			'Autoscroll',
			'Authenticator',
			'AuthenticationNotSupportedException',
			'AuthenticationException',
			'AudioSystem',
			'AudioPermission',
			'AudioInputStream',
			'AudioFormat.Encoding',
			'AudioFormat',
			'AudioFileWriter',
			'AudioFileReader',
			'AudioFileFormat.Type',
			'AudioFileFormat',
			'AudioClip',
			'Attributes.Name',
			'Attributes',
			'AttributedString',
			'AttributedCharacterIterator.Attribute',
			'AttributedCharacterIterator',
			'AttributeSet.ParagraphAttribute',
			'AttributeSet.FontAttribute',
			'AttributeSet.ColorAttribute',
			'AttributeSet.CharacterAttribute',
			'AttributeSet',
			'AttributeModificationException',
			'AttributeList',
			'AttributeInUseException',
			'Attribute',
			'AsyncBoxView',
			'Arrays',
			'ArrayStoreException',
			'ArrayList',
			'ArrayIndexOutOfBoundsException',
			'Array',
			'ArithmeticException',
			'AreaAveragingScaleFilter',
			'Area',
			'Arc2D.Float',
			'Arc2D.Double',
			'Arc2D',
			'ApplicationException',
			'AppletStub',
			'AppletInitializer',
			'AppletContext',
			'Applet',
			'AnySeqHolder',
			'AnySeqHelper',
			'AnyHolder',
			'Any',
			'Annotation',
			'AncestorListener',
			'AncestorEvent',
			'AlreadyBoundHolder',
			'AlreadyBoundHelper',
			'AlreadyBoundException',
			'AlreadyBound',
			'AlphaComposite',
			'AllPermission',
			'AlgorithmParametersSpi',
			'AlgorithmParameters',
			'AlgorithmParameterSpec',
			'AlgorithmParameterGeneratorSpi',
			'AlgorithmParameterGenerator',
			'AffineTransformOp',
			'AffineTransform',
			'Adler32',
			'AdjustmentListener',
			'AdjustmentEvent',
			'Adjustable',
			'ActiveEvent',
			'Activator',
			'ActivationSystem',
			'ActivationMonitor',
			'ActivationInstantiator',
			'ActivationID',
			'ActivationGroupID',
			'ActivationGroupDesc.CommandEnvironment',
			'ActivationGroupDesc',
			'ActivationGroup',
			'ActivationException',
			'ActivationDesc',
			'ActivateFailedException',
			'Activatable',
			'ActionMapUIResource',
			'ActionMap',
			'ActionListener',
			'ActionEvent',
			'Action',
			'AclNotFoundException',
			'AclEntry',
			'Acl',
			'AccessibleValue',
			'AccessibleText',
			'AccessibleTableModelChange',
			'AccessibleTable',
			'AccessibleStateSet',
			'AccessibleState',
			'AccessibleSelection',
			'AccessibleRole',
			'AccessibleResourceBundle',
			'AccessibleRelationSet',
			'AccessibleRelation',
			'AccessibleObject',
			'AccessibleIcon',
			'AccessibleHypertext',
			'AccessibleHyperlink',
			'AccessibleContext',
			'AccessibleComponent',
			'AccessibleBundle',
			'AccessibleAction',
			'Accessible',
			'AccessException',
			'AccessController',
			'AccessControlException',
			'AccessControlContext',
			'AbstractWriter',
			'AbstractUndoableEdit',
			'AbstractTableModel',
			'AbstractSet',
			'AbstractSequentialList',
			'AbstractMethodError',
			'AbstractMap',
			'AbstractListModel',
			'AbstractList',
			'AbstractLayoutCache.NodeDimensions',
			'AbstractLayoutCache',
			'AbstractDocument.ElementEdit',
			'AbstractDocument.Content',
			'AbstractDocument.AttributeContext',
			'AbstractDocument',
			'AbstractColorChooserPanel',
			'AbstractCollection',
			'AbstractCellEditor',
			'AbstractButton',
			'AbstractBorder',
			'AbstractAction',
			'AWTPermission',
			'AWTException',
			'AWTEventMulticaster',
			'AWTEventListener',
			'AWTEvent',
			'AWTError',
			'ARG_OUT',
			'ARG_INOUT',
			'ARG_IN'
			),
		4 => array(
			'void',
			'short',
			'long',
			'int',
			'double',
			'char',
			'byte',
			'boolean',
			'float'
			),
		5 => array(
			'toList',
			'subMap',
			'sort',
			'size',
			'reverseEach',
			'reverse',
			'pop',
			'min',
			'max',
			'join',
			'intersect',
			'inject',
			'grep',
			'get',
			'flatten',
			'findIndexOf',
			'findAll',
			'find',
			'eachWithIndex',
			'eachPropertyName',
			'eachProperty',
			'each',
			'count',
			'collect',
			'asSynchronized',
			'asImmutable',
			'allProperties'
			),
		6 => array(
			'tokenize',
			'toURL',
			'toLong',
			'toList',
			'toCharacter',
			'padRight',
			'padLeft',
			'eachMatch',
			'contains',
			'center'
			),
		7 => array(
			'writeLine',
			'write',
			'withWriterAppend',
			'withWriter',
			'withStreams',
			'withStream',
			'withReader',
			'withPrintWriter',
			'withOutputStream',
			'transformLine',
			'transformChar',
			'splitEachLine',
			'getText',
			'filterLine',
			'encodeBase64',
			'eachLines',
			'eachLine',
			'eachFileRecurse',
			'eachFile',
			'eachByte',
			'append'
			),
		8 => array(
			'dump',
			'inspect',
			'invokeMethod',
			'print',
			'println',
			'step',
			'times',
			'upto',
			'use',
			'getText',
			'start',
			'startDaemon',
			'getLastMatcher'
			),
		9 => array(
			'Sql',
			'call',
			'eachRow',
			'execute',
			'executeUpdate',
			'close'
			)
		),
	'SYMBOLS' => array(
		'(', ')', '[', ']', '{', '}', '*', '&', '%', '!', ';', '<', '>', '?', '|', '='
		),
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => true,
		1 => false,
		2 => false,
		3 => true,
		4 => true,
		5 => true,
		6 => true,
		7 => true,
		8 => true,
		9 => true
		),
	'STYLES' => array(
		'KEYWORDS' => array(
			1 => 'color: #b1b100;',
			2 => 'color: #000000; font-weight: bold;',
			3 => 'color: #aaaadd; font-weight: bold;',
			4 => 'color: #993333;',
			5 => 'color: #663399;',
			6 => 'color: #CC0099;',
			7 => 'color: #FFCC33;',
			8 => 'color: #993399;',
			9 => 'color: #993399; font-weight: bold;'
			),
		'COMMENTS' => array(
			1=> 'color: #808080; font-style: italic;',
			2=> 'color: #a1a100;',
			'MULTI' => 'color: #808080; font-style: italic;'
			),
		'ESCAPE_CHAR' => array(
			0 => 'color: #000099; font-weight: bold;'
			),
		'BRACKETS' => array(
			0 => 'color: #66cc66;'
			),
		'STRINGS' => array(
			0 => 'color: #ff0000;'
			),
		'NUMBERS' => array(
			0 => 'color: #cc66cc;'
			),
		'METHODS' => array(
			1 => 'color: #006600;',
			2 => 'color: #006600;'
			),
		'SYMBOLS' => array(
			0 => 'color: #66cc66;'
			),
		'SCRIPT' => array(
			),
		'REGEXPS' => array(
			0 => 'color: #0000ff;'
			)
		),
	'URLS' => array(
		1 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		2 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		3 => 'http://www.google.de/search?as_q={FNAME}&num=100&hl=en&as_occt=url&as_sitesearch=java.sun.com%2Fj2se%2F1.5.0%2Fdocs%2Fapi%2F',
		4 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		5 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		6 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		7 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		8 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}',
		9 => 'http://www.google.de/search?q=site%3Adocs.codehaus.org/%20{FNAME}'
		),
	'OOLANG' => true,
	'OBJECT_SPLITTERS' => array(
		1 => '.'
		),
	'REGEXPS' => array(
		0 => '\\$\\{[a-zA-Z_][a-zA-Z0-9_]*\\}'
		),
	'STRICT_MODE_APPLIES' => GESHI_NEVER,
	'SCRIPT_DELIMITERS' => array(
		),
	'HIGHLIGHT_STRICT_BLOCK' => array(
		)
);

?>
