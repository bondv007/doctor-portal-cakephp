<?php
/*************************************************************************************
 * java.php
 * --------
 * Author: Nigel McNie (nigel@geshi.org)
 * Copyright: (c) 2004 Nigel McNie (http://qbnz.com/highlighter/)
 * Release Version: 1.0.7.21
 * Date Started: 2004/07/10
 *
 * Java language file for GeSHi.
 *
 * CHANGES
 * -------
 * 2005/12/28 (1.0.4)
 *   -  Added instanceof keyword
 * 2004/11/27 (1.0.3)
 *   -  Added support for multiple object splitters
 * 2004/08/05 (1.0.2)
 *   -  Added URL support
 *   -  Added keyword "this", as bugs in GeSHi class ironed out
 * 2004/08/05 (1.0.1)
 *   -  Added support for symbols
 *   -  Added extra missed keywords
 * 2004/07/14 (1.0.0)
 *   -  First Release
 *
 * TODO (updated 2004/11/27)
 * -------------------------
 * * Compact the class names like the first few have been
 *   and eliminate repeats
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
	'LANG_NAME' => 'Java',
	'COMMENT_SINGLE' => array(1 => '//', 2 => 'import'),
	'COMMENT_MULTI' => array('/*' => '*/'),
	'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
	'QUOTEMARKS' => array("'", '"'),
	'ESCAPE_CHAR' => '\\',
	'KEYWORDS' => array(
		1 => array(
			'for', 'foreach', 'if', 'else', 'while', 'do',
			'switch', 'case'
			),
		2 => array(
			'null', 'return', 'false', 'final', 'true', 'public',
			'private', 'protected', 'extends', 'break', 'class',
			'new', 'try', 'catch', 'throws', 'finally', 'implements',
			'interface', 'throw', 'native', 'synchronized', 'this',
            'abstract', 'transient', 'instanceof', 'assert', 'continue',
            'default', 'enum', 'package', 'static', 'strictfp', 'super',
            'volatile', 'const', 'goto'
			),
		3 => array(
			'AbstractAction', 'AbstractBorder', 'AbstractButton', 'AbstractCellEditor',
			'AbstractCollection', 'AbstractColorChooserPanel', 'AbstractDocument',
			'AbstractDocument.AttributeContext', 'AbstractDocument.Content',
			'AbstractDocument.ElementEdit', 'AbstractLayoutCache',
			'AbstractLayoutCache.NodeDimensions', 'AbstractList', 'AbstractListModel',
			'AbstractMap', 'AbstractMethodError', 'AbstractSequentialList',
			'AbstractSet', 'AbstractTableModel', 'AbstractUndoableEdit', 'AbstractWriter',
			'AccessControlContext', 'AccessControlException', 'AccessController',
			'AccessException', 'Accessible', 'AccessibleAction', 'AccessibleBundle',
			'AccessibleComponent', 'AccessibleContext', 'AccessibleHyperlink',
			'AccessibleHypertext', 'AccessibleIcon', 'AccessibleObject',
			'AccessibleRelation', 'AccessibleRelationSet', 'AccessibleResourceBundle',
			'AccessibleRole', 'AccessibleSelection', 'AccessibleState',
			'AccessibleStateSet', 'AccessibleTable', 'AccessibleTableModelChange',
			'AccessibleText', 'AccessibleValue', 'Acl', 'AclEntry', 'AclNotFoundException',
			'Action', 'ActionEvent', 'ActionListener', 'ActionMap', 'ActionMapUIResource',
			'Activatable', 'ActivateFailedException', 'ActivationDesc',
			'ActivationException', 'ActivationGroup', 'ActivationGroupDesc',
			'ActivationGroupDesc.CommandEnvironment', 'ActivationGroupID', 'ActivationID',
			'ActivationInstantiator', 'ActivationMonitor', 'ActivationSystem',
			'Activator', 'ActiveEvent', 'Adjustable', 'AdjustmentEvent', 'AdjustmentListener',
			'Adler32', 'AffineTransform', 'AffineTransformOp', 'AlgorithmParameterGenerator',
			'AlgorithmParameterGeneratorSpi', 'AlgorithmParameters', 'AlgorithmParameterSpec',
			'AlgorithmParametersSpi', 'AllPermission', 'AlphaComposite', 'AlreadyBound',
			'AlreadyBoundException', 'AlreadyBoundHelper', 'AlreadyBoundHolder',
			'AncestorEvent', 'AncestorListener', 'Annotation', 'Any', 'AnyHolder',
			'AnySeqHelper', 'AnySeqHolder', 'Applet', 'AppletContext', 'AppletInitializer',
			'AppletStub', 'ApplicationException', 'Arc2D', 'Arc2D.Double', 'Arc2D.Float',
			'Area', 'AreaAveragingScaleFilter', 'ARG_IN', 'ARG_INOUT', 'ARG_OUT',
			'ArithmeticException', 'Array', 'ArrayIndexOutOfBoundsException',
			'ArrayList', 'Arrays', 'ArrayStoreException', 'AsyncBoxView',
			'Attribute', 'AttributedCharacterIterator', 'AttributedCharacterIterator.Attribute',
			'AttributedString', 'AttributeInUseException', 'AttributeList',
			'AttributeModificationException', 'Attributes', 'Attributes.Name',
			'AttributeSet', 'AttributeSet.CharacterAttribute', 'AttributeSet.ColorAttribute',
			'AttributeSet.FontAttribute', 'AttributeSet.ParagraphAttribute',
			'AudioClip', 'AudioFileFormat', 'AudioFileFormat.Type', 'AudioFileReader',
			'AudioFileWriter', 'AudioFormat', 'AudioFormat.Encoding', 'AudioInputStream',
			'AudioPermission', 'AudioSystem', 'AuthenticationException',
			'AuthenticationNotSupportedException', 'Authenticator', 'Autoscroll',
			'AWTError', 'AWTEvent', 'AWTEventListener', 'AWTEventMulticaster',
			'AWTException', 'AWTPermission', 'BAD_CONTEXT', 'BAD_INV_ORDER', 'BAD_OPERATION',
			'BAD_PARAM', 'BAD_POLICY', 'BAD_POLICY_TYPE', 'BAD_POLICY_VALUE', 'BAD_TYPECODE',
			'BadKind', 'BadLocationException', 'BandCombineOp', 'BandedSampleModel','BasicArrowButton',
			'BasicAttribute', 'BasicAttributes', 'BasicBorders', 'BasicBorders.ButtonBorder',
			'BasicBorders.FieldBorder', 'BasicBorders.MarginBorder', 'BasicBorders.MenuBarBorder',
			'BasicBorders.RadioButtonBorder', 'BasicBorders.SplitPaneBorder',
			'BasicBorders.ToggleButtonBorder', 'BasicButtonListener', 'BasicButtonUI',
			'BasicCheckBoxMenuItemUI', 'BasicCheckBoxUI', 'BasicColorChooserUI', 'BasicComboBoxEditor',
			'BasicComboBoxEditor.UIResource', 'BasicComboBoxRenderer', 'BasicComboBoxRenderer.UIResource',
			'BasicComboBoxUI', 'BasicComboPopup', 'BasicDesktopIconUI', 'BasicDesktopPaneUI',
			'BasicDirectoryModel', 'BasicEditorPaneUI', 'BasicFileChooserUI',
			'BasicGraphicsUtils', 'BasicHTML', 'BasicIconFactory', 'BasicInternalFrameTitlePane',
			'BasicInternalFrameUI', 'BasicLabelUI', 'BasicListUI', 'BasicLookAndFeel',
			'BasicMenuBarUI', 'BasicMenuItemUI', 'BasicMenuUI', 'BasicOptionPaneUI',
			'BasicOptionPaneUI.ButtonAreaLayout', 'BasicPanelUI', 'BasicPasswordFieldUI',
			'BasicPermission', 'BasicPopupMenuSeparatorUI', 'BasicPopupMenuUI',
			'BasicProgressBarUI', 'BasicRadioButtonMenuItemUI', 'BasicRadioButtonUI',
			'BasicRootPaneUI', 'BasicScrollBarUI', 'BasicScrollPaneUI', 'BasicSeparatorUI',
			'BasicSliderUI', 'BasicSplitPaneDivider', 'BasicSplitPaneUI', 'BasicStroke',
			'BasicTabbedPaneUI', 'BasicTableHeaderUI', 'BasicTableUI', 'BasicTextAreaUI',
			'BasicTextFieldUI', 'BasicTextPaneUI', 'BasicTextUI', 'BasicTextUI.BasicCaret',
			'BasicTextUI.BasicHighlighter', 'BasicToggleButtonUI', 'BasicToolBarSeparatorUI',
			'BasicToolBarUI', 'BasicToolTipUI', 'BasicTreeUI', 'BasicViewportUI',
			'BatchUpdateException', 'BeanContext', 'BeanContextChild',
			'BeanContextChildComponentProxy', 'BeanContextChildSupport', 'BeanContextContainerProxy',
			'BeanContextEvent', 'BeanContextMembershipEvent', 'BeanContextMembershipListener',
			'BeanContextProxy', 'BeanContextServiceAvailableEvent', 'BeanContextServiceProvider',
			'BeanContextServiceProviderBeanInfo', 'BeanContextServiceRevokedEvent',
			'BeanContextServiceRevokedListener', 'BeanContextServices',
			'BeanContextServicesListener', 'BeanContextServicesSupport',
			'BeanContextServicesSupport.BCSSServiceProvider', 'BeanContextSupport',
			'BeanContextSupport.BCSIterator', 'BeanDescriptor', 'BeanInfo', 'Beans',
			'BevelBorder', 'BigDecimal', 'BigInteger', 'BinaryRefAddr', 'BindException',
			'Binding', 'BindingHelper', 'BindingHolder', 'BindingIterator',
			'BindingIteratorHelper', 'BindingIteratorHolder', 'BindingIteratorOperations',
			'BindingListHelper', 'BindingListHolder', 'BindingType', 'BindingTypeHelper',
			'BindingTypeHolder', 'BitSet', 'Blob', 'BlockView', 'Book', 'Boolean',
			'BooleanControl', 'BooleanControl.Type', 'BooleanHolder', 'BooleanSeqHelper',
			'BooleanSeqHolder', 'Border', 'BorderFactory', 'BorderLayout', 'BorderUIResource',
			'BorderUIResource.BevelBorderUIResource', 'BorderUIResource.CompoundBorderUIResource',
			'BorderUIResource.EmptyBorderUIResource', 'BorderUIResource.EtchedBorderUIResource',
			'BorderUIResource.LineBorderUIResource', 'BorderUIResource.MatteBorderUIResource',
			'BorderUIResource.TitledBorderUIResource', 'BoundedRangeModel', 'Bounds',
			'Box', 'Box.Filler', 'BoxedValueHelper', 'BoxLayout', 'BoxView',
			'BreakIterator', 'BufferedImage', 'BufferedImageFilter', 'BufferedImageOp',
			'BufferedInputStream', 'BufferedOutputStream', 'BufferedReader', 'BufferedWriter',
			'Button', 'ButtonGroup', 'ButtonModel', 'ButtonUI', 'Byte', 'ByteArrayInputStream',
			'ByteArrayOutputStream', 'ByteHolder', 'ByteLookupTable', 'Calendar',
			'CallableStatement', 'CannotProceed', 'CannotProceedException', 'CannotProceedHelper',
			'CannotProceedHolder', 'CannotRedoException', 'CannotUndoException',
			'Canvas', 'CardLayout', 'Caret', 'CaretEvent', 'CaretListener', 'CellEditor',
			'CellEditorListener', 'CellRendererPane', 'Certificate', 'Certificate.CertificateRep',
			'CertificateEncodingException', 'CertificateException', 'CertificateExpiredException',
			'CertificateFactory', 'CertificateFactorySpi', 'CertificateNotYetValidException',
			'CertificateParsingException', 'ChangedCharSetException', 'ChangeEvent',
			'ChangeListener', 'Character', 'Character.Subset', 'Character.UnicodeBlock',
			'CharacterIterator', 'CharArrayReader', 'CharArrayWriter', 'CharConversionException',
			'CharHolder', 'CharSeqHelper', 'CharSeqHolder', 'Checkbox', 'CheckboxGroup',
			'CheckboxMenuItem', 'CheckedInputStream', 'CheckedOutputStream', 'Checksum',
			'Choice', 'ChoiceFormat', 'Class', 'ClassCastException', 'ClassCircularityError',
			'ClassDesc', 'ClassFormatError', 'ClassLoader', 'ClassNotFoundException',
			'Clip', 'Clipboard', 'ClipboardOwner', 'Clob', 'Cloneable', 'CloneNotSupportedException',
			'CMMException', 'CodeSource', 'CollationElementIterator', 'CollationKey',
			'Collator', 'Collection', 'Collections', 'Color', 'ColorChooserComponentFactory',
			'ColorChooserUI', 'ColorConvertOp', 'ColorModel', 'ColorSelectionModel',
			'ColorSpace', 'ColorUIResource', 'ComboBoxEditor', 'ComboBoxModel', 'ComboBoxUI',
			'ComboPopup', 'COMM_FAILURE', 'CommunicationException', 'Comparable',
			'Comparator', 'Compiler', 'CompletionStatus', 'CompletionStatusHelper',
			'Component', 'ComponentAdapter', 'ComponentColorModel', 'ComponentEvent',
			'ComponentInputMap', 'ComponentInputMapUIResource', 'ComponentListener',
			'ComponentOrientation', 'ComponentSampleModel', 'ComponentUI', 'ComponentView',
			'Composite', 'CompositeContext', 'CompositeName','CompositeView', 'CompoundBorder',
			'CompoundControl', 'CompoundControl.Type', 'CompoundEdit', 'CompoundName',
			'ConcurrentModificationException', 'ConfigurationException', 'ConnectException',
			'ConnectException', 'ConnectIOException', 'Connection', 'Constructor',
			'Container', 'ContainerAdapter', 'ContainerEvent', 'ContainerListener',
			'ContentHandler', 'ContentHandlerFactory', 'ContentModel', 'Context', 'ContextList',
			'ContextNotEmptyException', 'ContextualRenderedImageFactory', 'Control',
			'Control.Type', 'ControlFactory', 'ControllerEventListener', 'ConvolveOp',
			'CRC32', 'CRL', 'CRLException', 'CropImageFilter', 'CSS', 'CSS.Attribute',
			'CTX_RESTRICT_SCOPE', 'CubicCurve2D', 'CubicCurve2D.Double', 'CubicCurve2D.Float',
			'Current', 'CurrentHelper', 'CurrentHolder', 'CurrentOperations', 'Cursor',
			'Customizer', 'CustomMarshal', 'CustomValue', 'DATA_CONVERSION', 'DatabaseMetaData',
			'DataBuffer', 'DataBufferByte', 'DataBufferInt', 'DataBufferShort', 'DataBufferUShort',
			'DataFlavor', 'DataFormatException', 'DatagramPacket', 'DatagramSocket',
			'DatagramSocketImpl', 'DatagramSocketImplFactory', 'DataInput', 'DataInputStream',
			'DataLine', 'DataLine.Info', 'DataOutput', 'DataOutputStream', 'DataOutputStream',
			'DataTruncation', 'Date', 'DateFormat', 'DateFormatSymbols', 'DebugGraphics',
			'DecimalFormat', 'DecimalFormatSymbols', 'DefaultBoundedRangeModel',
			'DefaultButtonModel', 'DefaultCaret', 'DefaultCellEditor', 'DefaultColorSelectionModel',
			'DefaultComboBoxModel', 'DefaultDesktopManager', 'DefaultEditorKit',
			'DefaultEditorKit.BeepAction', 'DefaultEditorKit.CopyAction',
			'DefaultEditorKit.CutAction', 'DefaultEditorKit.DefaultKeyTypedAction',
			'DefaultEditorKit.InsertBreakAction', 'DefaultEditorKit.InsertContentAction',
			'DefaultEditorKit.InsertTabAction', 'DefaultEditorKit.PasteAction,',
			'DefaultFocusManager', 'DefaultHighlighter', 'DefaultHighlighter.DefaultHighlightPainter',
			'DefaultListCellRenderer', 'DefaultListCellRenderer.UIResource', 'DefaultListModel',
			'DefaultListSelectionModel', 'DefaultMenuLayout', 'DefaultMetalTheme',
			'DefaultMutableTreeNode', 'DefaultSingleSelectionModel', 'DefaultStyledDocument',
			'DefaultStyledDocument.AttributeUndoableEdit', 'DefaultStyledDocument.ElementSpec',
			'DefaultTableCellRenderer', 'DefaultTableCellRenderer.UIResource', 'DefaultTableColumnModel',
			'DefaultTableModel', 'DefaultTextUI', 'DefaultTreeCellEditor', 'DefaultTreeCellRenderer',
			'DefaultTreeModel', 'DefaultTreeSelectionModel', 'DefinitionKind', 'DefinitionKindHelper',
			'Deflater', 'DeflaterOutputStream', 'Delegate', 'DesignMode', 'DesktopIconUI',
			'DesktopManager', 'DesktopPaneUI', 'DGC', 'Dialog', 'Dictionary', 'DigestException',
			'DigestInputStream', 'DigestOutputStream', 'Dimension', 'Dimension2D',
			'DimensionUIResource', 'DirContext', 'DirectColorModel', 'DirectoryManager',
			'DirObjectFactory', 'DirStateFactory', 'DirStateFactory.Result', 'DnDConstants',
			'Document', 'DocumentEvent', 'DocumentEvent.ElementChange', 'DocumentEvent.EventType',
			'DocumentListener', 'DocumentParser', 'DomainCombiner', 'DomainManager',
			'DomainManagerOperations', 'Double', 'DoubleHolder', 'DoubleSeqHelper',
			'DoubleSeqHolder', 'DragGestureEvent', 'DragGestureListener', 'DragGestureRecognizer',
			'DragSource', 'DragSourceContext', 'DragSourceDragEvent', 'DragSourceDropEvent',
			'DragSourceEvent', 'DragSourceListener', 'Driver', 'DriverManager',
			'DriverPropertyInfo', 'DropTarget', 'DropTarget.DropTargetAutoScroller',
			'DropTargetContext', 'DropTargetDragEvent', 'DropTargetDropEvent',
			'DropTargetEvent', 'DropTargetListener', 'DSAKey', 'DSAKeyPairGenerator',
			'DSAParameterSpec', 'DSAParams', 'DSAPrivateKey', 'DSAPrivateKeySpec',
			'DSAPublicKey', 'DSAPublicKeySpec', 'DTD', 'DTDConstants', 'DynamicImplementation',
			'DynAny', 'DynArray', 'DynEnum', 'DynFixed', 'DynSequence', 'DynStruct',
			'DynUnion', 'DynValue', 'EditorKit', 'Element', 'ElementIterator', 'Ellipse2D',
			'Ellipse2D.Double', 'Ellipse2D.Float', 'EmptyBorder', 'EmptyStackException',
			'EncodedKeySpec', 'Entity', 'EnumControl', 'EnumControl.Type','Enumeration',
			'Environment', 'EOFException', 'Error', 'EtchedBorder', 'Event', 'EventContext',
			'EventDirContext', 'EventListener', 'EventListenerList', 'EventObject', 'EventQueue',
			'EventSetDescriptor', 'Exception', 'ExceptionInInitializerError', 'ExceptionList',
			'ExpandVetoException', 'ExportException', 'ExtendedRequest', 'ExtendedResponse',
			'Externalizable', 'FeatureDescriptor', 'Field', 'FieldNameHelper',
			'FieldPosition', 'FieldView', 'File', 'FileChooserUI', 'FileDescriptor',
			'FileDialog', 'FileFilter', 'FileFilter', 'FileInputStream', 'FilenameFilter',
			'FileNameMap', 'FileNotFoundException', 'FileOutputStream', 'FilePermission',
			'FileReader', 'FileSystemView', 'FileView', 'FileWriter', 'FilteredImageSource',
			'FilterInputStream', 'FilterOutputStream', 'FilterReader', 'FilterWriter',
			'FixedHeightLayoutCache', 'FixedHolder', 'FlatteningPathIterator', 'FlavorMap',
			'Float', 'FloatControl', 'FloatControl.Type', 'FloatHolder', 'FloatSeqHelper',
			'FloatSeqHolder', 'FlowLayout', 'FlowView', 'FlowView.FlowStrategy', 'FocusAdapter',
			'FocusEvent', 'FocusListener', 'FocusManager', 'Font', 'FontFormatException',
			'FontMetrics', 'FontRenderContext', 'FontUIResource', 'Format', 'FormatConversionProvider',
			'FormView', 'Frame', 'FREE_MEM', 'GapContent', 'GeneralPath', 'GeneralSecurityException',
			'GlyphJustificationInfo', 'GlyphMetrics', 'GlyphVector', 'GlyphView', 'GlyphView.GlyphPainter',
			'GradientPaint', 'GraphicAttribute', 'Graphics', 'Graphics2D', 'GraphicsConfigTemplate',
			'GraphicsConfiguration', 'GraphicsDevice', 'GraphicsEnvironment', 'GrayFilter',
            'GregorianCalendar', 'GridBagConstraints', 'GridBagLayout', 'GridLayout', 'Group', 'Guard',
			'GuardedObject', 'GZIPInputStream', 'GZIPOutputStream',
			'HasControls',
			'HashMap',
			'HashSet',
			'Hashtable',
			'HierarchyBoundsAdapter',
			'HierarchyBoundsListener',
			'HierarchyEvent',
			'HierarchyListener',
			'Highlighter',
			'Highlighter.Highlight',
			'Highlighter.HighlightPainter',
			'HTML',
			'HTML.Attribute',
			'HTML.Tag',
			'HTML.UnknownTag',
			'HTMLDocument',
			'HTMLDocument.Iterator',
			'HTMLEditorKit',
			'HTMLEditorKit.HTMLFactory',
			'HTMLEditorKit.HTMLTextAction',
			'HTMLEditorKit.InsertHTMLTextAction',
			'HTMLEditorKit.LinkController',
			'HTMLEditorKit.Parser',
			'HTMLEditorKit.ParserCallback',
			'HTMLFrameHyperlinkEvent',
			'HTMLWriter',
			'HttpURLConnection',
			'HyperlinkEvent',
			'HyperlinkEvent.EventType',
			'HyperlinkListener',
			'ICC_ColorSpace',
			'ICC_Profile',
			'ICC_ProfileGray',
			'ICC_ProfileRGB',
			'Icon',
			'IconUIResource',
			'IconView',
			'IdentifierHelper',
			'Identity',
			'IdentityScope',
			'IDLEntity',
			'IDLType',
			'IDLTypeHelper', 'IDLTypeOperations',
			'IllegalAccessError',
			'IllegalAccessException',
			'IllegalArgumentException',
			'IllegalComponentStateException',
			'IllegalMonitorStateException',
			'IllegalPathStateException',
			'IllegalStateException',
			'IllegalThreadStateException',
			'Image',
			'ImageConsumer',
			'ImageFilter',
			'ImageGraphicAttribute',
			'ImageIcon',
			'ImageObserver',
			'ImageProducer',
			'ImagingOpException',
			'IMP_LIMIT',
			'IncompatibleClassChangeError',
			'InconsistentTypeCode',
			'IndexColorModel',
			'IndexedPropertyDescriptor',
			'IndexOutOfBoundsException',
			'IndirectionException',
			'InetAddress',
			'Inflater',
			'InflaterInputStream',
			'InheritableThreadLocal',
			'InitialContext',
			'InitialContextFactory',
			'InitialContextFactoryBuilder',
			'InitialDirContext',
			'INITIALIZE',
			'Initializer',
			'InitialLdapContext',
			'InlineView',
			'InputContext',
			'InputEvent',
			'InputMap',
			'InputMapUIResource',
			'InputMethod',
			'InputMethodContext',
			'InputMethodDescriptor',
			'InputMethodEvent',
			'InputMethodHighlight',
			'InputMethodListener',
			'InputMethodRequests',
			'InputStream',
			'InputStream',
			'InputStream',
			'InputStreamReader',
			'InputSubset',
			'InputVerifier',
			'Insets',
			'InsetsUIResource',
			'InstantiationError',
			'InstantiationException',
			'Instrument',
			'InsufficientResourcesException',
			'Integer',
			'INTERNAL',
			'InternalError', 'InternalFrameAdapter',
			'InternalFrameEvent',
			'InternalFrameListener',
			'InternalFrameUI',
			'InterruptedException',
			'InterruptedIOException',
			'InterruptedNamingException',
			'INTF_REPOS',
			'IntHolder',
			'IntrospectionException',
			'Introspector',
			'INV_FLAG',
			'INV_IDENT',
			'INV_OBJREF',
			'INV_POLICY',
			'Invalid',
			'INVALID_TRANSACTION',
			'InvalidAlgorithmParameterException',
			'InvalidAttributeIdentifierException',
			'InvalidAttributesException',
			'InvalidAttributeValueException',
			'InvalidClassException',
			'InvalidDnDOperationException',
			'InvalidKeyException',
			'InvalidKeySpecException',
			'InvalidMidiDataException',
			'InvalidName',
			'InvalidName',
			'InvalidNameException',
			'InvalidNameHelper',
			'InvalidNameHolder',
			'InvalidObjectException',
			'InvalidParameterException',
			'InvalidParameterSpecException',
			'InvalidSearchControlsException',
			'InvalidSearchFilterException',
			'InvalidSeq',
			'InvalidTransactionException',
			'InvalidValue',
			'InvocationEvent',
			'InvocationHandler',
			'InvocationTargetException',
			'InvokeHandler',
			'IOException',
			'IRObject',
			'IRObjectOperations', 'IstringHelper', 'ItemEvent', 'ItemListener',
			'ItemSelectable', 'Iterator', 'JApplet', 'JarEntry', 'JarException',
			'JarFile', 'JarInputStream', 'JarOutputStream', 'JarURLConnection',
			'JButton', 'JCheckBox', 'JCheckBoxMenuItem', 'JColorChooser',
			'JComboBox',
			'JComboBox.KeySelectionManager',
			'JComponent',
			'JDesktopPane',
			'JDialog',
			'JEditorPane',
			'JFileChooser',
			'JFrame',
			'JInternalFrame',
			'JInternalFrame.JDesktopIcon',
			'JLabel',
			'JLayeredPane',
			'JList',
			'JMenu',
			'JMenuBar',
			'JMenuItem',
			'JobAttributes',
			'JobAttributes.DefaultSelectionType',
			'JobAttributes.DestinationType',
			'JobAttributes.DialogType',
			'JobAttributes.MultipleDocumentHandlingType',
			'JobAttributes.SidesType',
			'JOptionPane',
			'JPanel',
			'JPasswordField',
			'JPopupMenu',
			'JPopupMenu.Separator',
			'JProgressBar',
			'JRadioButton',
			'JRadioButtonMenuItem',
			'JRootPane',
			'JScrollBar',
			'JScrollPane',
			'JSeparator',
			'JSlider',
			'JSplitPane',
			'JTabbedPane',
			'JTable',
			'JTableHeader',
			'JTextArea',
			'JTextComponent',
			'JTextComponent.KeyBinding', 'JTextField',
			'JTextPane',
			'JToggleButton',
			'JToggleButton.ToggleButtonModel',
			'JToolBar',
			'JToolBar.Separator',
			'JToolTip',
			'JTree',
			'JTree.DynamicUtilTreeNode',
			'JTree.EmptySelectionModel',
			'JViewport',
			'JWindow',
			'Kernel',
			'Key',
			'KeyAdapter',
			'KeyEvent',
			'KeyException',
			'KeyFactory',
			'KeyFactorySpi',
			'KeyListener',
			'KeyManagementException',
			'Keymap',
			'KeyPair',
			'KeyPairGenerator',
			'KeyPairGeneratorSpi',
			'KeySpec',
			'KeyStore',
			'KeyStoreException',
			'KeyStoreSpi',
			'KeyStroke',
			'Label',
			'LabelUI',
			'LabelView',
			'LastOwnerException',
			'LayeredHighlighter',
			'LayeredHighlighter.LayerPainter',
			'LayoutManager',
			'LayoutManager2',
			'LayoutQueue',
			'LdapContext',
			'LdapReferralException',
			'Lease',
			'LimitExceededException',
			'Line',
			'Line.Info',
			'Line2D',
			'Line2D.Double',
			'Line2D.Float',
			'LineBorder',
			'LineBreakMeasurer',
			'LineEvent',
			'LineEvent.Type',
			'LineListener',
			'LineMetrics',
			'LineNumberInputStream',
			'LineNumberReader',
			'LineUnavailableException',
			'LinkageError',
			'LinkedList',
			'LinkException',
			'LinkLoopException',
			'LinkRef',
			'List',
			'List',
			'ListCellRenderer',
			'ListDataEvent',
			'ListDataListener',
			'ListIterator',
			'ListModel',
			'ListResourceBundle',
			'ListSelectionEvent',
			'ListSelectionListener',
			'ListSelectionModel',
			'ListUI',
			'ListView',
			'LoaderHandler',
			'Locale',
			'LocateRegistry',
			'LogStream',
			'Long',
			'LongHolder',
			'LongLongSeqHelper',
			'LongLongSeqHolder',
			'LongSeqHelper',
			'LongSeqHolder',
			'LookAndFeel',
			'LookupOp',
			'LookupTable',
			'MalformedLinkException',
			'MalformedURLException',
			'Manifest', 'Map',
			'Map.Entry',
			'MARSHAL',
			'MarshalException',
			'MarshalledObject',
			'Math',
			'MatteBorder',
			'MediaTracker',
			'Member',
			'MemoryImageSource',
			'Menu',
			'MenuBar',
			'MenuBarUI',
			'MenuComponent',
			'MenuContainer',
			'MenuDragMouseEvent',
			'MenuDragMouseListener',
			'MenuElement',
			'MenuEvent',
			'MenuItem',
			'MenuItemUI',
			'MenuKeyEvent',
			'MenuKeyListener',
			'MenuListener',
			'MenuSelectionManager',
			'MenuShortcut',
			'MessageDigest',
			'MessageDigestSpi',
			'MessageFormat',
			'MetaEventListener',
			'MetalBorders',
			'MetalBorders.ButtonBorder',
			'MetalBorders.Flush3DBorder',
			'MetalBorders.InternalFrameBorder',
			'MetalBorders.MenuBarBorder',
			'MetalBorders.MenuItemBorder',
			'MetalBorders.OptionDialogBorder',
			'MetalBorders.PaletteBorder',
			'MetalBorders.PopupMenuBorder',
			'MetalBorders.RolloverButtonBorder',
			'MetalBorders.ScrollPaneBorder',
			'MetalBorders.TableHeaderBorder',
			'MetalBorders.TextFieldBorder',
			'MetalBorders.ToggleButtonBorder',
			'MetalBorders.ToolBarBorder',
			'MetalButtonUI',
			'MetalCheckBoxIcon',
			'MetalCheckBoxUI',
			'MetalComboBoxButton',
			'MetalComboBoxEditor',
			'MetalComboBoxEditor.UIResource',
			'MetalComboBoxIcon',
			'MetalComboBoxUI',
			'MetalDesktopIconUI',
			'MetalFileChooserUI',
			'MetalIconFactory',
			'MetalIconFactory.FileIcon16',
			'MetalIconFactory.FolderIcon16',
			'MetalIconFactory.PaletteCloseIcon',
			'MetalIconFactory.TreeControlIcon',
			'MetalIconFactory.TreeFolderIcon',
			'MetalIconFactory.TreeLeafIcon',
			'MetalInternalFrameTitlePane',
			'MetalInternalFrameUI',
			'MetalLabelUI',
			'MetalLookAndFeel',
			'MetalPopupMenuSeparatorUI',
			'MetalProgressBarUI',
			'MetalRadioButtonUI',
			'MetalScrollBarUI',
			'MetalScrollButton',
			'MetalScrollPaneUI',
			'MetalSeparatorUI',
			'MetalSliderUI',
			'MetalSplitPaneUI',
			'MetalTabbedPaneUI',
			'MetalTextFieldUI',
			'MetalTheme',
			'MetalToggleButtonUI',
			'MetalToolBarUI',
			'MetalToolTipUI',
			'MetalTreeUI',
			'MetaMessage',
			'Method',
			'MethodDescriptor',
			'MidiChannel',
			'MidiDevice',
			'MidiDevice.Info',
			'MidiDeviceProvider',
			'MidiEvent',
			'MidiFileFormat',
			'MidiFileReader',
			'MidiFileWriter',
			'MidiMessage',
			'MidiSystem',
			'MidiUnavailableException',
			'MimeTypeParseException',
			'MinimalHTMLWriter',
			'MissingResourceException',
			'Mixer',
			'Mixer.Info',
			'MixerProvider',
			'ModificationItem',
			'Modifier',
			'MouseAdapter',
			'MouseDragGestureRecognizer',
			'MouseEvent',
			'MouseInputAdapter',
			'MouseInputListener',
			'MouseListener',
			'MouseMotionAdapter',
			'MouseMotionListener',
			'MultiButtonUI',
			'MulticastSocket',
			'MultiColorChooserUI',
			'MultiComboBoxUI',
			'MultiDesktopIconUI',
			'MultiDesktopPaneUI',
			'MultiFileChooserUI',
			'MultiInternalFrameUI',
			'MultiLabelUI', 'MultiListUI',
			'MultiLookAndFeel',
			'MultiMenuBarUI',
			'MultiMenuItemUI',
			'MultiOptionPaneUI',
			'MultiPanelUI',
			'MultiPixelPackedSampleModel',
			'MultipleMaster',
			'MultiPopupMenuUI',
			'MultiProgressBarUI',
			'MultiScrollBarUI',
			'MultiScrollPaneUI',
			'MultiSeparatorUI',
			'MultiSliderUI',
			'MultiSplitPaneUI',
			'MultiTabbedPaneUI',
			'MultiTableHeaderUI',
			'MultiTableUI',
			'MultiTextUI',
			'MultiToolBarUI',
			'MultiToolTipUI',
			'MultiTreeUI',
			'MultiViewportUI',
			'MutableAttributeSet',
			'MutableComboBoxModel',
			'MutableTreeNode',
			'Name',
			'NameAlreadyBoundException',
			'NameClassPair',
			'NameComponent',
			'NameComponentHelper',
			'NameComponentHolder',
			'NamedValue',
			'NameHelper',
			'NameHolder',
			'NameNotFoundException',
			'NameParser',
			'NamespaceChangeListener',
			'NameValuePair',
			'NameValuePairHelper',
			'Naming',
			'NamingContext',
			'NamingContextHelper',
			'NamingContextHolder',
			'NamingContextOperations',
			'NamingEnumeration',
			'NamingEvent',
			'NamingException',
			'NamingExceptionEvent',
			'NamingListener',
			'NamingManager',
			'NamingSecurityException',
			'NegativeArraySizeException',
			'NetPermission',
			'NO_IMPLEMENT',
			'NO_MEMORY',
			'NO_PERMISSION',
			'NO_RESOURCES',
			'NO_RESPONSE',
			'NoClassDefFoundError',
			'NoInitialContextException', 'NoninvertibleTransformException',
			'NoPermissionException',
			'NoRouteToHostException',
			'NoSuchAlgorithmException',
			'NoSuchAttributeException',
			'NoSuchElementException',
			'NoSuchFieldError',
			'NoSuchFieldException',
			'NoSuchMethodError',
			'NoSuchMethodException',
			'NoSuchObjectException',
			'NoSuchProviderException',
			'NotActiveException',
			'NotBoundException',
			'NotContextException',
			'NotEmpty',
			'NotEmptyHelper',
			'NotEmptyHolder',
			'NotFound',
			'NotFoundHelper',
			'NotFoundHolder',
			'NotFoundReason',
			'NotFoundReasonHelper',
			'NotFoundReasonHolder',
			'NotOwnerException',
			'NotSerializableException',
			'NullPointerException',
			'Number',
			'NumberFormat', 'NumberFormatException', 'NVList',
			'OBJ_ADAPTER', 'Object', 'OBJECT_NOT_EXIST', 'ObjectChangeListener',
			'ObjectFactory',
			'ObjectFactoryBuilder',
			'ObjectHelper',
			'ObjectHolder',
			'ObjectImpl', 'ObjectImpl',
			'ObjectInput',
			'ObjectInputStream',
			'ObjectInputStream.GetField',
			'ObjectInputValidation',
			'ObjectOutput',
			'ObjectOutputStream',
			'ObjectOutputStream.PutField',
			'ObjectStreamClass',
			'ObjectStreamConstants',
			'ObjectStreamException',
			'ObjectStreamField',
			'ObjectView',
			'ObjID',
			'Observable',
			'Observer',
			'OctetSeqHelper',
			'OctetSeqHolder',
			'OMGVMCID',
			'OpenType',
			'Operation',
			'OperationNotSupportedException',
			'Option',
			'OptionalDataException',
			'OptionPaneUI',
			'ORB',
			'OutOfMemoryError',
			'OutputStream',
			'OutputStreamWriter',
			'OverlayLayout',
			'Owner',
			'Package',
			'PackedColorModel',
			'Pageable',
			'PageAttributes',
			'PageAttributes.ColorType',
			'PageAttributes.MediaType',
			'PageAttributes.OrientationRequestedType',
			'PageAttributes.OriginType',
			'PageAttributes.PrintQualityType',
			'PageFormat',
			'Paint',
			'PaintContext',
			'PaintEvent',
			'Panel',
			'PanelUI',
			'Paper',
			'ParagraphView',
			'ParagraphView',
			'ParameterBlock',
			'ParameterDescriptor',
			'ParseException',
			'ParsePosition',
			'Parser',
			'ParserDelegator',
			'PartialResultException',
			'PasswordAuthentication',
			'PasswordView',
			'Patch',
			'PathIterator',
			'Permission',
			'Permission',
			'PermissionCollection',
			'Permissions',
			'PERSIST_STORE',
			'PhantomReference',
			'PipedInputStream',
			'PipedOutputStream',
			'PipedReader',
			'PipedWriter',
			'PixelGrabber',
			'PixelInterleavedSampleModel',
			'PKCS8EncodedKeySpec',
			'PlainDocument',
			'PlainView',
			'Point',
			'Point2D',
			'Point2D.Double',
			'Point2D.Float',
			'Policy',
			'Policy',
			'PolicyError',
			'PolicyHelper',
			'PolicyHolder',
			'PolicyListHelper',
			'PolicyListHolder',
			'PolicyOperations', 'PolicyTypeHelper',
			'Polygon',
			'PopupMenu',
			'PopupMenuEvent',
			'PopupMenuListener',
			'PopupMenuUI',
			'Port',
			'Port.Info',
			'PortableRemoteObject',
			'PortableRemoteObjectDelegate',
			'Position',
			'Position.Bias',
			'PreparedStatement',
			'Principal',
			'Principal',
			'PrincipalHolder',
			'Printable',
			'PrinterAbortException',
			'PrinterException',
			'PrinterGraphics',
			'PrinterIOException',
			'PrinterJob',
			'PrintGraphics',
			'PrintJob',
			'PrintStream',
			'PrintWriter',
			'PRIVATE_MEMBER',
			'PrivateKey',
			'PrivilegedAction',
			'PrivilegedActionException',
			'PrivilegedExceptionAction',
			'Process',
			'ProfileDataException',
			'ProgressBarUI',
			'ProgressMonitor',
			'ProgressMonitorInputStream',
			'Properties',
			'PropertyChangeEvent',
			'PropertyChangeListener',
			'PropertyChangeSupport',
			'PropertyDescriptor',
			'PropertyEditor',
			'PropertyEditorManager',
			'PropertyEditorSupport',
			'PropertyPermission',
			'PropertyResourceBundle',
			'PropertyVetoException',
			'ProtectionDomain',
			'ProtocolException',
			'Provider',
			'ProviderException',
			'Proxy',
			'PUBLIC_MEMBER',
			'PublicKey',
			'PushbackInputStream',
			'PushbackReader',
			'QuadCurve2D',
			'QuadCurve2D.Double',
			'QuadCurve2D.Float',
			'Random',
			'RandomAccessFile', 'Raster', 'RasterFormatException', 'RasterOp',
			'Reader', 'Receiver', 'Rectangle', 'Rectangle2D', 'Rectangle2D.Double',
			'Rectangle2D.Float', 'RectangularShape', 'Ref', 'RefAddr', 'Reference',
			'Referenceable', 'ReferenceQueue', 'ReferralException',
			'ReflectPermission', 'Registry', 'RegistryHandler', 'RemarshalException',
			'Remote', 'RemoteCall', 'RemoteException', 'RemoteObject', 'RemoteRef',
			'RemoteServer',
			'RemoteStub',
			'RenderableImage',
			'RenderableImageOp',
			'RenderableImageProducer',
			'RenderContext',
			'RenderedImage',
			'RenderedImageFactory',
			'Renderer',
			'RenderingHints',
			'RenderingHints.Key',
			'RepaintManager',
			'ReplicateScaleFilter',
			'Repository',
			'RepositoryIdHelper',
			'Request',
			'RescaleOp',
			'Resolver',
			'ResolveResult',
			'ResourceBundle',
			'ResponseHandler',
			'ResultSet',
			'ResultSetMetaData',
			'ReverbType',
			'RGBImageFilter',
			'RMIClassLoader',
			'RMIClientSocketFactory',
			'RMIFailureHandler',
			'RMISecurityException',
			'RMISecurityManager',
			'RMIServerSocketFactory',
			'RMISocketFactory',
			'Robot',
			'RootPaneContainer',
			'RootPaneUI',
			'RoundRectangle2D',
			'RoundRectangle2D.Double',
			'RoundRectangle2D.Float',
			'RowMapper',
			'RSAKey',
			'RSAKeyGenParameterSpec',
			'RSAPrivateCrtKey',
			'RSAPrivateCrtKeySpec',
			'RSAPrivateKey',
			'RSAPrivateKeySpec',
			'RSAPublicKey',
			'RSAPublicKeySpec',
			'RTFEditorKit',
			'RuleBasedCollator',
			'Runnable',
			'Runtime',
			'RunTime',
			'RuntimeException',
			'RunTimeOperations',
			'RuntimePermission',
			'SampleModel',
			'SchemaViolationException',
			'Scrollable',
			'Scrollbar',
			'ScrollBarUI',
			'ScrollPane',
			'ScrollPaneConstants',
			'ScrollPaneLayout',
			'ScrollPaneLayout.UIResource',
			'ScrollPaneUI',
			'SearchControls',
			'SearchResult',
			'SecureClassLoader',
			'SecureRandom',
			'SecureRandomSpi',
			'Security',
			'SecurityException',
			'SecurityManager',
			'SecurityPermission',
			'Segment',
			'SeparatorUI',
			'Sequence',
			'SequenceInputStream',
			'Sequencer',
			'Sequencer.SyncMode',
			'Serializable',
			'SerializablePermission',
			'ServantObject',
			'ServerCloneException',
			'ServerError', 'ServerException',
			'ServerNotActiveException',
			'ServerRef',
			'ServerRequest',
			'ServerRuntimeException',
			'ServerSocket',
			'ServiceDetail',
			'ServiceDetailHelper',
			'ServiceInformation',
			'ServiceInformationHelper',
			'ServiceInformationHolder',
			'ServiceUnavailableException',
			'Set',
			'SetOverrideType',
			'SetOverrideTypeHelper',
			'Shape',
			'ShapeGraphicAttribute',
			'Short',
			'ShortHolder',
			'ShortLookupTable',
			'ShortMessage',
			'ShortSeqHelper',
			'ShortSeqHolder',
			'Signature',
			'SignatureException',
			'SignatureSpi',
			'SignedObject',
			'Signer',
			'SimpleAttributeSet',
			'SimpleBeanInfo',
			'SimpleDateFormat',
			'SimpleTimeZone',
			'SinglePixelPackedSampleModel',
			'SingleSelectionModel',
			'SizeLimitExceededException',
			'SizeRequirements',
			'SizeSequence',
			'Skeleton',
			'SkeletonMismatchException',
			'SkeletonNotFoundException',
			'SliderUI',
			'Socket',
			'SocketException',
			'SocketImpl',
			'SocketImplFactory',
			'SocketOptions',
			'SocketPermission',
			'SocketSecurityException',
			'SoftBevelBorder',
			'SoftReference',
			'SortedMap',
			'SortedSet',
			'Soundbank',
			'SoundbankReader',
			'SoundbankResource',
			'SourceDataLine',
			'SplitPaneUI',
			'SQLData',
			'SQLException',
			'SQLInput',
			'SQLOutput', 'SQLPermission',
			'SQLWarning',
			'Stack',
			'StackOverflowError',
			'StateEdit',
			'StateEditable',
			'StateFactory',
			'Statement',
			'Streamable',
			'StreamableValue',
			'StreamCorruptedException',
			'StreamTokenizer',
			'StrictMath',
			'String',
			'StringBuffer',
			'StringBufferInputStream',
			'StringCharacterIterator',
			'StringContent',
			'StringHolder',
			'StringIndexOutOfBoundsException',
			'StringReader',
			'StringRefAddr',
			'StringSelection',
			'StringTokenizer',
			'StringValueHelper',
			'StringWriter',
			'Stroke',
			'Struct',
			'StructMember',
			'StructMemberHelper',
			'Stub',
			'StubDelegate',
			'StubNotFoundException',
			'Style',
			'StyleConstants',
			'StyleConstants.CharacterConstants',
			'StyleConstants.ColorConstants',
			'StyleConstants.FontConstants',
			'StyleConstants.ParagraphConstants',
			'StyleContext',
			'StyledDocument',
			'StyledEditorKit',
			'StyledEditorKit.AlignmentAction',
			'StyledEditorKit.BoldAction',
			'StyledEditorKit.FontFamilyAction',
			'StyledEditorKit.FontSizeAction',
			'StyledEditorKit.ForegroundAction',
			'StyledEditorKit.ItalicAction',
			'StyledEditorKit.StyledTextAction',
			'StyledEditorKit.UnderlineAction',
			'StyleSheet',
			'StyleSheet.BoxPainter',
			'StyleSheet.ListPainter',
			'SwingConstants',
			'SwingPropertyChangeSupport',
			'SwingUtilities',
			'SyncFailedException',
			'Synthesizer',
			'SysexMessage',
			'System',
			'SystemColor', 'SystemException',
			'SystemFlavorMap',
			'TabableView',
			'TabbedPaneUI',
			'TabExpander',
			'TableCellEditor',
			'TableCellRenderer',
			'TableColumn',
			'TableColumnModel',
			'TableColumnModelEvent',
			'TableColumnModelListener',
			'TableHeaderUI',
			'TableModel',
			'TableModelEvent',
			'TableModelListener',
			'TableUI',
			'TableView',
			'TabSet',
			'TabStop',
			'TagElement',
			'TargetDataLine',
			'TCKind',
			'TextAction',
			'TextArea',
			'TextAttribute',
			'TextComponent',
			'TextEvent',
			'TextField',
			'TextHitInfo',
			'TextLayout',
			'TextLayout.CaretPolicy',
			'TextListener',
			'TextMeasurer',
			'TextUI',
			'TexturePaint',
			'Thread',
			'ThreadDeath',
			'ThreadGroup',
			'ThreadLocal',
			'Throwable',
			'Tie',
			'TileObserver',
			'Time',
			'TimeLimitExceededException',
			'Timer',
			'Timer',
			'TimerTask',
			'Timestamp',
			'TimeZone',
			'TitledBorder',
			'ToolBarUI',
			'Toolkit',
			'ToolTipManager',
			'ToolTipUI',
			'TooManyListenersException',
			'Track',
			'TRANSACTION_REQUIRED',
			'TRANSACTION_ROLLEDBACK',
			'TransactionRequiredException',
			'TransactionRolledbackException',
			'Transferable',
			'TransformAttribute',
			'TRANSIENT',
			'Transmitter',
			'Transparency',
			'TreeCellEditor',
			'TreeCellRenderer',
			'TreeExpansionEvent',
			'TreeExpansionListener',
			'TreeMap',
			'TreeModel',
			'TreeModelEvent',
			'TreeModelListener',
			'TreeNode',
			'TreePath',
			'TreeSelectionEvent',
			'TreeSelectionListener',
			'TreeSelectionModel',
			'TreeSet',
			'TreeUI',
			'TreeWillExpandListener',
			'TypeCode',
			'TypeCodeHolder',
			'TypeMismatch',
			'Types',
			'UID',
			'UIDefaults',
			'UIDefaults.ActiveValue',
			'UIDefaults.LazyInputMap',
			'UIDefaults.LazyValue',
			'UIDefaults.ProxyLazyValue', 'UIManager',
			'UIManager.LookAndFeelInfo',
			'UIResource',
			'ULongLongSeqHelper',
			'ULongLongSeqHolder',
			'ULongSeqHelper',
			'ULongSeqHolder',
			'UndeclaredThrowableException',
			'UndoableEdit',
			'UndoableEditEvent',
			'UndoableEditListener',
			'UndoableEditSupport',
			'UndoManager',
			'UnexpectedException',
			'UnicastRemoteObject',
			'UnionMember',
			'UnionMemberHelper',
			'UNKNOWN',
			'UnknownError',
			'UnknownException',
			'UnknownGroupException',
			'UnknownHostException',
			'UnknownHostException',
			'UnknownObjectException',
			'UnknownServiceException',
			'UnknownUserException',
			'UnmarshalException',
			'UnrecoverableKeyException',
			'Unreferenced',
			'UnresolvedPermission',
			'UnsatisfiedLinkError',
			'UnsolicitedNotification',
			'UnsolicitedNotificationEvent',
			'UnsolicitedNotificationListener',
			'UNSUPPORTED_POLICY',
			'UNSUPPORTED_POLICY_VALUE',
			'UnsupportedAudioFileException',
			'UnsupportedClassVersionError',
			'UnsupportedEncodingException',
			'UnsupportedFlavorException',
			'UnsupportedLookAndFeelException',
			'UnsupportedOperationException',
			'URL',
			'URLClassLoader',
			'URLConnection',
			'URLDecoder',
			'URLEncoder',
			'URLStreamHandler',
			'URLStreamHandlerFactory',
			'UserException',
			'UShortSeqHelper',
			'UShortSeqHolder',
			'UTFDataFormatException',
			'Util',
			'UtilDelegate',
			'Utilities',
			'ValueBase',
			'ValueBaseHelper',
			'ValueBaseHolder',
			'ValueFactory',
			'ValueHandler',
			'ValueMember',
			'ValueMemberHelper',
			'VariableHeightLayoutCache',
			'Vector',
			'VerifyError',
			'VersionSpecHelper',
			'VetoableChangeListener',
			'VetoableChangeSupport',
			'View',
			'ViewFactory',
			'ViewportLayout',
			'ViewportUI',
			'VirtualMachineError',
			'Visibility',
			'VisibilityHelper',
			'VM_ABSTRACT',
			'VM_CUSTOM',
			'VM_NONE',
			'VM_TRUNCATABLE',
			'VMID',
			'VoiceStatus',
			'Void',
			'WCharSeqHelper',
			'WCharSeqHolder',
			'WeakHashMap',
			'WeakReference',
			'Window',
			'WindowAdapter',
			'WindowConstants',
			'WindowEvent', 'WindowListener',
			'WrappedPlainView',
			'WritableRaster',
			'WritableRenderedImage',
			'WriteAbortedException',
			'Writer',
			'WrongTransaction',
			'WStringValueHelper',
			'X509Certificate',
			'X509CRL',
			'X509CRLEntry',
			'X509EncodedKeySpec',
			'X509Extension',
			'ZipEntry',
			'ZipException',
			'ZipFile',
			'ZipInputStream',
			'ZipOutputStream',
			'ZoneView',
			'_BindingIteratorImplBase',
			'_BindingIteratorStub',
			'_IDLTypeStub',
			'_NamingContextImplBase',
			'_NamingContextStub',
			'_PolicyStub',
			'_Remote_Stub '
			),
		4 => array(
			'void', 'double', 'int', 'boolean', 'byte', 'short', 'long', 'char', 'float'
			)
		),
	'SYMBOLS' => array(
		'(', ')', '[', ']', '{', '}', '*', '&', '%', '!', ';', '<', '>', '?'
		),
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => true,
		1 => false,
		2 => false,
		3 => true,
		4 => true
		),
	'STYLES' => array(
		'KEYWORDS' => array(
			1 => 'color: #b1b100;',
			2 => 'color: #000000; font-weight: bold;',
			3 => 'color: #aaaadd; font-weight: bold;',
			4 => 'color: #993333;'
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
			)
		),
	'URLS' => array(
		1 => '',
		2 => '',
		3 => 'http://www.google.com/search?hl=en&amp;q=allinurl%3A{FNAME}+java.sun.com&amp;btnI=I%27m%20Feeling%20Lucky',
		4 => ''
		),
	'OOLANG' => true,
	'OBJECT_SPLITTERS' => array(
		1 => '.'
		),
	'REGEXPS' => array(
		),
	'STRICT_MODE_APPLIES' => GESHI_NEVER,
	'SCRIPT_DELIMITERS' => array(
		),
	'HIGHLIGHT_STRICT_BLOCK' => array(
		)
);

?>
